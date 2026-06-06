<?php

if (!defined('ABSPATH')) {
    exit;
}

class NumaMigrations
{
    public static function migrate(): void
    {
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        $schemas = require __DIR__ . '/schema.php';

        foreach ($schemas as $callback) {

            $sql = $callback();

            dbDelta($sql);
        }
    }

    public static function rollback(): void
    {
        global $wpdb;

        $tables = [
            'dt_tour_import_images',
            'dt_tour_imports',
        ];

        foreach ($tables as $table) {

            $wpdb->query(
                "DROP TABLE IF EXISTS `{$table}`"
            );
        }
    }
}