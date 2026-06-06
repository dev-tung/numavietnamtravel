<?php

class GenericCrawler extends BaseCrawler
{
    protected function parse(string $html): array
    {
        $xpath = $this->createXPath($html);

        return [
            'title' => $this->cleanText(
                $this->firstMatchText($xpath, [
                    '//h1',
                    '//title',
                ])
            ),

            'itinerary' => $this->stringifyItinerary($this->extractItinerary($xpath, [
                "//div[contains(@class,'itineraries-time-line-item')]",
                "//div[@id='tour-component__item--2']",
                "//div[@id='detail1']",
                "//div[contains(translate(., 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'itinerary')]",
                "//section[contains(translate(., 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'itinerary')]",
                "//article[contains(translate(., 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'itinerary')]",
                "//div[contains(translate(., 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'lichtrinh')]",
                "//section[contains(translate(., 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'lichtrinh')]",
                "//article[contains(translate(., 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'lichtrinh')]",
            ])) ?: $this->cleanText($this->firstMatchText($xpath, [
                "//div[contains(@class,'itineraries-time-line-item')]",
                "//div[@id='tour-component__item--2']",
                "//div[@id='detail1']",
                "//div[contains(translate(., 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'itinerary')]",
                "//section[contains(translate(., 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'itinerary')]",
                "//article[contains(translate(., 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'itinerary')]",
                "//div[contains(translate(., 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'lichtrinh')]",
                "//section[contains(translate(., 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'lichtrinh')]",
                "//article[contains(translate(., 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'lichtrinh')]",
            ])),

            'images' => $this->extractImages($xpath),
        ];
    }
}