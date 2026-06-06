<?php

class CruiseCrawler extends BaseCrawler
{
    protected function parse(string $html): array
    {
        $xpath = $this->createXPath($html);

        return [
            'title' => $this->cleanText(
                $this->firstMatchText($xpath, [
                    '//h1',
                    "//*[contains(@class,'title')]",
                    "//*[contains(@class,'product_title')]",
                ])
            ),

            'itinerary' => $this->stringifyItinerary($this->extractItinerary($xpath, [
                "//div[contains(@class,'itineraries-time-line-item')]",
                "//div[@id='tour-component__item--2']",
                "//div[@id='detail1']",
                "//div[@id='tab-description']",
                "//div[contains(@class,'woocommerce-Tabs-panel--description')]",
                "//div[contains(translate(., 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'itinerary')]",
                "//div[contains(@class,'program')]",
                "//section[contains(@class,'itinerary')]",
            ])) ?: $this->cleanText($this->firstMatchText($xpath, [
                "//div[contains(@class,'itineraries-time-line-item')]",
                "//div[@id='tour-component__item--2']",
                "//div[@id='detail1']",
                "//div[@id='tab-description']",
                "//div[contains(@class,'woocommerce-Tabs-panel--description')]",
                "//div[contains(translate(., 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'itinerary')]",
                "//div[contains(@class,'program')]",
            ])),

            'images' => $this->extractImages($xpath),
        ];
    }
}