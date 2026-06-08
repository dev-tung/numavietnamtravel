<?php 

class WordPressTourCrawler extends BaseCrawler
{
    protected function parse(string $html): array
    {
        $xpath = $this->createXPath($html);

        return [
            'title' => $this->cleanText(
                $this->firstMatchText($xpath, [
                    '//h1',
                    '//header//h1',
                    "//*[contains(@class,'entry-title')]",
                ])
            ),

            'itinerary' => $this->stringifyItinerary($this->extractItinerary($xpath, [
                "//div[@id='itinerary']",
                "//div[contains(@class,'tour-itinerary')]",
                "//div[contains(@class,'th_lichtrinh')]",
                "//div[contains(@class,'itinerary')]",
                "//section[contains(@class,'itinerary')]",
            ])) ?: $this->cleanText($this->firstMatchText($xpath, [
                "//div[@id='itinerary']",
                "//div[contains(@class,'tour-itinerary')]",
                "//div[contains(@class,'th_lichtrinh')]",
                "//div[contains(@class,'itinerary')]",
            ])),

            'images' => $this->extractImages($xpath),
        ];
    }
}