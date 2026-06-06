<?php

if (!defined('ABSPATH')) {
    exit;
}

class SourceProvider
{
    public static function all(): array
    {
        return require __DIR__ . '/tours.php';
    }
}