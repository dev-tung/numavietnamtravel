<?php

class CrawlerFactory
{
    public static function make(string $url): BaseCrawler
    {
        $host = parse_url($url, PHP_URL_HOST) ?: '';

        if (
            str_contains($host, 'halong') ||
            str_contains($host, 'lanha') ||
            str_contains($host, 'cruise') ||
            str_contains($host, 'hera') ||
            str_contains($host, 'ambassador') ||
            str_contains($host, 'victoryeratravel')
        ) {
            return new CruiseCrawler();
        }

        if (
            str_contains($host, 'cozy') ||
            str_contains($host, 'daytour') ||
            str_contains($host, 'goasia') ||
            str_contains($host, 'vegatravel') ||
            str_contains($host, 'bestpricetravel')
        ) {
            return new WordPressTourCrawler();
        }

        return new GenericCrawler();
    }
}
