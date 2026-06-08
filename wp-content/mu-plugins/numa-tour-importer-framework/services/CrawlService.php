<?php

class CrawlService
{
    public function getResults(): array
    {
        $sources = SourceProvider::all();

        $isUrlList = function (array $list): bool {

            if (empty($list)) {
                return false;
            }

            foreach ($list as $value) {

                if (!is_string($value)) {
                    return false;
                }
            }

            return true;
        };

        $crawlTree = function (
            array $node,
            array $path = []
        ) use (&$crawlTree, $isUrlList) {

            $result = [];

            foreach ($node as $key => $value) {

                if (!is_array($value)) {
                    continue;
                }

                if ($isUrlList($value)) {

                    $result[$key] = [];

                    foreach ($value as $url) {

                        try {

                            $crawler = CrawlerFactory::make($url);

                            $crawler->setSourceData([
                                'category_1' => $path[0] ?? '',
                                'category_2' => $path[1] ?? '',
                                'category_3' => $path[2] ?? '',
                                'url'        => $url,
                            ]);

                            $result[$key][] =
                                $crawler->crawl($url);

                        } catch (Exception $e) {

                            $result[$key][] = [
                                'url'   => $url,
                                'error' => $e->getMessage(),
                            ];
                        }
                    }

                } else {

                    $result[$key] = $crawlTree(
                        $value,
                        array_merge($path, [$key])
                    );
                }
            }

            return $result;
        };

        return $crawlTree($sources);
    }
}