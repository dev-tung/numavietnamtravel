<?php

if (!defined('ABSPATH')) {
    exit;
}

class GalleryParser
{
    public static function parse(
        DOMXPath $xpath
    ): array {

        $images = [];

        $nodes = $xpath->query(
            '//img'
        );

        foreach ($nodes as $node) {

            $src = trim(
                $node->getAttribute('src')
            );

            if (!$src) {
                continue;
            }

            if (
                str_contains(
                    $src,
                    'data:image'
                )
            ) {
                continue;
            }

            $images[] = $src;
        }

        return array_values(
            array_unique($images)
        );
    }
}