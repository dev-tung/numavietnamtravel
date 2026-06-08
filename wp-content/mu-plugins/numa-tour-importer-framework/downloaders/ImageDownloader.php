<?php

class ImageDownloader
{
    public function downloadImage(string $url, string $saveDir): ?string
    {
        $path = parse_url($url, PHP_URL_PATH);

        $basename = basename($path);

        if ($basename) {
            $filename = md5($url) . '-' . $basename;
        } else {
            $filename = md5($url) . '.jpg';
        }

        $savePath = $saveDir . '/' . $filename;

        if (file_exists($savePath)) {
            return $savePath;
        }

        $response = wp_remote_get($url, [
            'timeout' => 60,
            'sslverify' => false,
        ]);

        if (is_wp_error($response)) {
            return null;
        }

        $body = wp_remote_retrieve_body($response);

        if (!$body) {
            return null;
        }

        file_put_contents($savePath, $body);

        return $savePath;
    }

    public function downloadImagesRecursively(array &$node, string $imageDir): void
    {
        foreach ($node as &$value) {

            if (!is_array($value)) {
                continue;
            }

            if (isset($value['images']) && is_array($value['images'])) {

                $downloaded = [];

                foreach ($value['images'] as $imageUrl) {

                    $localFile = $this->downloadImage(
                        $imageUrl,
                        $imageDir
                    );

                    if ($localFile) {
                        $downloaded[] = basename($localFile);
                    }
                }

                $value['local_images'] = $downloaded;

                continue;
            }

            $this->downloadImagesRecursively(
                $value,
                $imageDir
            );
        }
    }
}