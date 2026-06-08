<?php

if (!defined('ABSPATH')) {
    exit;
}

class SourceFlattener
{
    public static function flatten(array $sources): array
    {
        $items = [];

        foreach ($sources as $level1 => $level2s) {

            foreach ($level2s as $level2 => $level3s) {

                foreach ($level3s as $level3 => $urls) {

                    foreach ($urls as $item) {

                        $url = is_array($item)
                            ? $item['url']
                            : $item;

                        $items[] = [

                            'category_1' => $level1,

                            'category_2' => $level2,

                            'category_3' => $level3,

                            'url' => $url,

                            'domain' => parse_url(
                                $url,
                                PHP_URL_HOST
                            ),

                        ];
                    }
                }
            }
        }

        return $items;
    }
}