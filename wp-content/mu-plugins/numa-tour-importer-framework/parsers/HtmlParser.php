<?php

if (!defined('ABSPATH')) {
    exit;
}

class HtmlParser
{
    protected DOMDocument $dom;

    protected DOMXPath $xpath;

    public function __construct(string $html)
    {
        libxml_use_internal_errors(true);

        $this->dom = new DOMDocument();

        @$this->dom->loadHTML($html);

        $this->xpath = new DOMXPath(
            $this->dom
        );
    }

    public function xpath(): DOMXPath
    {
        return $this->xpath;
    }

    public function query(
        string $selector
    ): DOMNodeList {

        return $this->xpath->query(
            $selector
        );
    }

    public function nodeHtml(
        DOMNode $node
    ): string {

        return $this->dom->saveHTML(
            $node
        );
    }
}