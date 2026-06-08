<?php

if (!defined('ABSPATH')) {
    exit;
}

class JsonLdParser
{
    public static function parse(
        string $html
    ): array {

        preg_match_all(
            '#<script[^>]*type=["\']application/ld\+json["\'][^>]*>(.*?)</script>#is',
            $html,
            $matches
        );

        $result = [];

        foreach (
            $matches[1] ?? []
            as $json
        ) {

            $data = json_decode(
                trim($json),
                true
            );

            if (
                json_last_error()
                === JSON_ERROR_NONE
            ) {

                $result[] = $data;
            }
        }

        return $result;
    }

    public static function findTour(
        array $schemas
    ): ?array {

        foreach ($schemas as $schema) {

            if (
                isset($schema['@type'])
                &&
                in_array(
                    $schema['@type'],
                    [
                        'TouristTrip',
                        'Product',
                        'Trip',
                        'Tour'
                    ]
                )
            ) {

                return $schema;
            }
        }

        return null;
    }
}