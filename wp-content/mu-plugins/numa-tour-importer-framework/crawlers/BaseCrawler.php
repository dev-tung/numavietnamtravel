<?php

abstract class BaseCrawler
{
    protected string $url;
    protected array $sourceData = [];

    public function setSourceData(array $data): self
    {
        $this->sourceData = $data;
        return $this;
    }

    public function crawl(string $url): array
    {
        $this->url = $url;

        $html = $this->fetch($url);

        $parsed = $this->parse($html);

        # attach the source url so callers can display which source produced
        # this parsed output. Prefer any url previously attached via
        # setSourceData(), otherwise use the requested URL.
        $sourceUrl = $this->sourceData['url'] ?? $url;

        return array_merge(['source_url' => $sourceUrl], $parsed);
    }

    protected function fetch(string $url): string
    {
        $args = [
            'timeout' => 60,
            'redirection' => 5,
            'headers' => [
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
                'Accept-Language' => 'en-US,en;q=0.9',
                'Connection' => 'keep-alive',
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
                'Upgrade-Insecure-Requests' => '1',
                'Referer' => 'https://www.google.com/',
            ],
        ];

        $response = wp_remote_get($url, $args);
        $status = is_array($response) ? wp_remote_retrieve_response_code($response) : null;

        if (is_wp_error($response) || $status === 403) {
            if (is_wp_error($response)) {
                $message = $response->get_error_message();
            } else {
                $message = 'HTTP ' . $status;
            }

            if ($this->shouldRetryWithSslVerifyFalse($message)) {
                $args['sslverify'] = false;
            }

            $args['headers']['Referer'] = $url;
            $args['headers']['Cache-Control'] = 'no-cache';
            $response = wp_remote_get($url, $args);
            $status = is_array($response) ? wp_remote_retrieve_response_code($response) : null;
        }

        if ((is_wp_error($response) || $status === 403) && function_exists('curl_init')) {
            $body = $this->fetchWithCurl($url, $args['headers']);
            if ($body !== null) {
                return $body;
            }
        }

        if (is_wp_error($response)) {
            throw new Exception(
                $response->get_error_message()
            );
        }

        if ($status === 403) {
            throw new Exception('HTTP 403 Forbidden fetching ' . $url);
        }

        return wp_remote_retrieve_body($response);
    }

    protected function fetchWithCurl(string $url, array $headers): ?string
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 5);
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array_map(function ($key, $value) {
            return $key . ': ' . $value;
        }, array_keys($headers), $headers));

        $body = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($body === false || $code === 403) {
            return null;
        }

        return $body;
    }

    protected function shouldRetryWithSslVerifyFalse(string $message): bool
    {
        return preg_match('/SSL_read|ssl_read|SSL_connect|ssl_connect|unexpected eof|SSL routines/i', $message) === 1;
    }

    protected function createXPath(string $html): DOMXPath
    {
        $dom = new DOMDocument();

        libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html);
        libxml_clear_errors();

        return new DOMXPath($dom);
    }

    protected function firstText(DOMXPath $xpath, string $query): string
    {
        $nodes = $xpath->query($query);

        if (!$nodes || $nodes->length === 0) {
            return '';
        }

        return trim(preg_replace('/\s+/', ' ', $nodes->item(0)->textContent));
    }

    protected function firstMatchText(DOMXPath $xpath, array $queries): string
    {
        foreach ($queries as $query) {
            $value = $this->firstText($xpath, $query);

            if (!empty($value)) {
                return $value;
            }
        }

        return '';
    }

    protected function cleanText(string $text): string
    {
        return trim(preg_replace('/\s+/', ' ', html_entity_decode($text, ENT_QUOTES, 'UTF-8')));
    }


protected function extractImages(DOMXPath $xpath): array
{
    $images = [];

    $nodes = $xpath->query("
        //article//img |
        //div[contains(@class,'content')]//img |
        //div[contains(@class,'post')]//img |
        //div[contains(@class,'entry')]//img |
        //div[contains(@class,'single')]//img |
        //div[contains(@class,'swiper')]//img |
        //div[contains(@class,'slick')]//img |
        //div[contains(@class,'gallery')]//img |
        //img
    ");

    foreach ($nodes as $node) {

        $attrs = [
            'data-src',
            'data-original',
            'data-lazy',
            'data-url',
            'data-lazy-src',
            'data-flickity-lazyload',
            'data-image',
            'data-thumb',
            'src'
        ];

        $src = '';

        foreach ($attrs as $attr) {

            $value = trim($node->getAttribute($attr));

            if (!$value) {
                continue;
            }

            // bỏ placeholder lazyload
            if (
                str_starts_with($value, 'data:image') ||
                str_contains($value, 'svg+xml')
            ) {
                continue;
            }

            $src = $value;
            break;
        }

        if (!$src) {
            continue;
        }

        $src = $this->normalizeImageUrl($src);

        if (!$src) {
            continue;
        }

        if (!$this->isValidImage($src)) {
            continue;
        }

        $images[] = $src;
    }

    return array_values(array_unique($images));
}

private function normalizeImageUrl(string $url): ?string
{
    $url = trim(html_entity_decode($url));

    if (!$url) {
        return null;
    }

    if (str_starts_with($url, 'data:')) {
        return null;
    }

    // srcset
    if (str_contains($url, ',')) {
        $parts = explode(',', $url);
        $url = trim(explode(' ', trim($parts[0]))[0]);
    }

    // protocol-relative
    if (str_starts_with($url, '//')) {
        return 'https:' . $url;
    }

    // absolute URL
    if (preg_match('#^https?://#i', $url)) {
        return $url;
    }

    $base = rtrim($this->getSourceDomain(), '/');

    if (!$base) {
        return $url;
    }

    // /img/a.jpg
    if (str_starts_with($url, '/')) {
        return $base . $url;
    }

    // img/a.jpg
    return $base . '/' . ltrim($url, '/');
}

private function isValidImage(string $url): bool
{
    $url = strtolower(trim($url));

    if (!$url) {
        return false;
    }

    if (str_starts_with($url, 'data:')) {
        return false;
    }

    if (
        str_contains($url, 'pixel') ||
        str_contains($url, 'tracking') ||
        str_contains($url, 'google-analytics')
    ) {
        return false;
    }

$blocked = [
    // system
    'favicon',
    'ajax-loader',
    'spinner',
    'loading',
    'placeholder',
    'tracking',
    'pixel',
    'analytics',

    // logo / branding
    'logo',
    'brand',
    'vector',
    'union',

    // navigation
    'menu',
    'close',
    'search',
    'search-icon',
    'previous',
    'next',
    'arrow',
    'back',
    'forward',

    // icon
    'icon',
    'icons',
    'round-icons',

    // social
    'social',
    'facebook',
    'instagram',
    'youtube',
    'twitter',
    'linkedin',
    'pinterest',
    'telegram',
    'zalo',
    'tiktok',

    // payment
    'payment',
    'paypal',
    'visa',
    'mastercard',
    'amex',
    'jcb',
    'bank',

    // language
    '/en.',
    '/vn.',
    '_en.',
    '_vn.',
    '-en.',
    '-vn.',
    '/en/',
    '/vn/',

    // flags
    'flag',
    'flags',

    // common facility icons
    'bed.',
    'bed-',
    'fork.',
    'knife',
    'house.',
    'terrace',
    'music.',
    'mic.',
    'star.',
    'circle',
    'roundtrip',
    'sightseeing-fee',
    'onboard',

    // theme assets
    '/themes/',
    '/theme/',
    '/assets/',
    '/header/',
    '/footer/',

    'thumb',
    'thumbnail',
    'email',
    'tel',
    '120x120',
    '300x200',
    '150x150',
    '80x80',
    'map',
    'qr-img',
    'whatsapp',
    '100x100',
    'phone',
    'ico11'
];

    foreach ($blocked as $word) {
        if (str_contains($url, $word)) {
            return false;
        }
    }

    $path = strtolower(parse_url($url, PHP_URL_PATH) ?? '');

    $filename = basename($path);

    if (
        str_contains($filename, 'thumb') ||
        str_contains($filename, 'thumbnail')
    ) {
        return false;
    }


    return true;
}

private function getSourceDomain(): string
{
    if (!property_exists($this, 'url') || empty($this->url)) {
        return '';
    }

    $parts = parse_url($this->url);

    if (
        empty($parts['scheme']) ||
        empty($parts['host'])
    ) {
        return '';
    }

    return $parts['scheme'] . '://' . $parts['host'];
}


    /**
     * Try a list of XPath queries and parse the first block that yields
     * content into structured itinerary items.
     *
     * Returns an array of items: each item is ['time'=>string, 'description'=>string]
     */
    protected function extractItinerary(DOMXPath $xpath, array $queries): array
    {
        foreach ($queries as $query) {
            $nodes = $xpath->query($query);

            if (!$nodes || $nodes->length === 0) {
                continue;
            }

            $items = [];

            foreach ($nodes as $node) {
                $parsed = $this->parseItineraryBlock($node);

                if (!empty($parsed)) {
                    $items = array_merge($items, $parsed);
                }
            }

            if (!empty($items)) {
                return $items;
            }
        }

        return [];
    }

    /**
     * Parse a DOMNode block (usually a container) into itinerary items.
     * Looks for <p> elements and <strong> time markers; merges continuation
     * paragraphs into the previous item's description.
     */
    protected function parseItineraryBlock(DOMNode $block): array
    {
        if ($block instanceof DOMElement) {
            $blockClass = strtolower($block->getAttribute('class') ?: '');

            if (str_contains($blockClass, 'time-line-item')) {
                $time = '';
                $description = '';

                foreach ($block->childNodes as $child) {
                    if (!$child instanceof DOMElement) {
                        continue;
                    }

                    $childClass = strtolower($child->getAttribute('class') ?: '');

                    if (str_contains($childClass, 'time')) {
                        $time = trim(preg_replace('/\s+/', ' ', $child->textContent));
                        continue;
                    }

                    if (str_contains($childClass, 'desc')) {
                        $description = trim(preg_replace('/\s+/', ' ', $child->textContent));
                    }
                }

                if ($description !== '') {
                    return [[
                        'time' => $this->cleanText($time),
                        'description' => $this->cleanText($description),
                    ]];
                }
            }
        }

        $items = [];

        $paragraphs = [];

        $paragraphs = [];
        $allowedTags = ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'];

        $walk = function (DOMNode $node) use (&$paragraphs, $allowedTags, &$walk) {
            if ($node->nodeType === XML_ELEMENT_NODE && in_array(strtolower($node->nodeName), $allowedTags, true)) {
                $paragraphs[] = $node;
                return;
            }

            foreach ($node->childNodes as $child) {
                $walk($child);
            }
        };

        $walk($block);

        if (empty($paragraphs)) {
            $text = trim(preg_replace('/\s+/', ' ', $block->textContent));
            return $text ? [['time' => '', 'description' => $text]] : [];
        }

        $current = null;

        foreach ($paragraphs as $p) {
            $strongs = [];
            foreach ($p->childNodes as $cn) {
                if ($cn->nodeType === XML_ELEMENT_NODE && in_array(strtolower($cn->nodeName), ['strong', 'b'], true)) {
                    $strongs[] = trim(preg_replace('/\s+/', ' ', $cn->textContent));
                }
            }

            $pText = trim(preg_replace('/\s+/', ' ', $p->textContent));
            if (preg_match('/^itinerary\s*[:\-–]*$/i', $pText)) {
                continue;
            }

            $strongText = count($strongs) === 1 ? $strongs[0] : '';

            if ($strongText !== '' && $this->isTimeHeaderParagraph($pText, $strongText, count($strongs))) {
                $desc = trim(str_replace($strongText, '', $pText));
                $items[] = ['time' => $strongText, 'description' => $desc];
                $current = &$items[count($items) - 1];
            } elseif (preg_match('/^\s*([^:\-–]+?)\s*[:\-–]\s*(.+)$/u', $pText, $matches) && !$this->containsManyStrongTags($p)) {
                $items[] = ['time' => trim($matches[1]), 'description' => trim($matches[2])];
                $current = &$items[count($items) - 1];
            } else {
                if ($current !== null) {
                    $current['description'] .= "\n" . $pText;
                } else {
                    $items[] = ['time' => '', 'description' => $pText];
                    $current = &$items[count($items) - 1];
                }
            }
        }

        return $items;
    }

    protected function stringifyItinerary(array $items): string
    {
        $lines = [];

        foreach ($items as $item) {
            $time = isset($item['time']) ? trim($item['time']) : '';
            $desc = isset($item['description']) ? trim($item['description']) : '';

            if ($time !== '' && $desc !== '') {
                $lines[] = $this->cleanText($time . ': ' . $desc);
            } elseif ($desc !== '') {
                $lines[] = $this->cleanText($desc);
            } elseif ($time !== '') {
                $lines[] = $this->cleanText($time);
            }
        }

        return trim(implode("\n", $lines));
    }

    protected function containsManyStrongTags(DOMNode $node): bool
    {
        $count = 0;
        foreach ($node->getElementsByTagName('*') as $child) {
            if (in_array(strtolower($child->nodeName), ['strong', 'b'], true)) {
                $count++;
                if ($count > 1) {
                    return true;
                }
            }
        }

        return false;
    }

    protected function isTimeHeaderParagraph(string $pText, string $strongText, int $strongCount): bool
    {
        if ($strongCount !== 1) {
            return false;
        }

        if ($strongText === '') {
            return false;
        }

        if (preg_match('/\d{1,2}[\.:]\d{2}/', $strongText)) {
            return true;
        }

        if (preg_match('/\b(?:morning|afternoon|evening|day|half day|full day|tour)\b/i', $strongText)) {
            return true;
        }

        if (preg_match('/duration\b/i', $strongText)) {
            return true;
        }

        return $pText === $strongText || str_starts_with($pText, $strongText);
    }

    abstract protected function parse(string $html): array;
}