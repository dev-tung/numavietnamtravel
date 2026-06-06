<?php

if (!defined('ABSPATH')) {
    exit;
}

class ContentParser
{
    public static function clean(
        string $html
    ): string {

        $html = preg_replace(
            '#<script\b[^>]*>(.*?)</script>#is',
            '',
            $html
        );

        $html = preg_replace(
            '#<style\b[^>]*>(.*?)</style>#is',
            '',
            $html
        );

        $html = preg_replace(
            '#<!--(.*?)-->#is',
            '',
            $html
        );

        return trim(
            wp_kses_post($html)
        );
    }

    public static function removeImages(
        string $html
    ): string {

        return preg_replace(
            '#<img[^>]*>#i',
            '',
            $html
        );
    }

    public static function removeIframes(
        string $html
    ): string {

        return preg_replace(
            '#<iframe\b[^>]*>(.*?)</iframe>#is',
            '',
            $html
        );
    }

    public static function normalizeWhitespace(
        string $html
    ): string {

        return preg_replace(
            '/\s+/',
            ' ',
            $html
        );
    }
}