<?php
if (!defined('ABSPATH')) {
    exit;
}


require_once __DIR__ . '/database/migrations.php';

add_action('admin_init', function () {

    if (!current_user_can('administrator')) {
        return;
    }

    /**
     * CREATE DATABASE TABLES
     *
     * URL:
     * /wp-admin/?numa_migrate=1
     *
     * Example:
     * http://localhost:8080/wp-admin/?numa_migrate=1
     */
    if (isset($_GET['numa_migrate'])) {

        NumaMigrations::migrate();

        wp_die('Migration completed');
    }

    /**
     * DROP DATABASE TABLES
     *
     * URL:
     * /wp-admin/?numa_rollback=1
     *
     * Example:
     * http://localhost:8080/wp-admin/?numa_rollback=1
     */
    if (isset($_GET['numa_rollback'])) {

        NumaMigrations::rollback();

        wp_die('Rollback completed');
    }

    /**
     * CHECK DATABASE STATUS
     *
     * URL:
     * /wp-admin/?numa_status=1
     *
     * Example:
     * http://localhost:8080/wp-admin/?numa_status=1
     */
    if (isset($_GET['numa_status'])) {

        global $wpdb;

        $tables = [
            $wpdb->prefix . 'mu_tour_imports',
            $wpdb->prefix . 'mu_tour_import_images',
        ];

        echo '<pre>';

        foreach ($tables as $table) {

            $exists = $wpdb->get_var(
                $wpdb->prepare(
                    "SHOW TABLES LIKE %s",
                    $table
                )
            );

            echo $table . ' : ';

            echo $exists
                ? 'EXISTS'
                : 'MISSING';

            echo PHP_EOL;
        }

        echo '</pre>';

        exit;
    }
    /**
     * URL:
     * /wp-admin/?numa_sources=1
     */
    if (isset($_GET['numa_sources'])) {

        require_once __DIR__ . '/sources/SourceProvider.php';

        echo '<pre>';

        print_r(
            SourceProvider::all()
        );

        echo '</pre>';

        exit;
    }

    /**
     * URL:
     * /wp-admin/?numa_crawl=1
     */
    if (isset($_GET['numa_crawl'])) {

        require_once __DIR__ . '/sources/SourceProvider.php';

        require_once __DIR__ . '/crawlers/BaseCrawler.php';

        require_once __DIR__ . '/crawlers/WordPressTourCrawler.php';
        require_once __DIR__ . '/crawlers/CruiseCrawler.php';
        require_once __DIR__ . '/crawlers/GenericCrawler.php';

        require_once __DIR__ . '/crawlers/CrawlerFactory.php';

        $sources = SourceProvider::all();

        $isUrlList = function (array $list): bool {
            if (empty($list)) {
                return false;
            }

            foreach ($list as $value) {
                if (!is_string($value)) {
                    return false;
                }
            }

            return true;
        };

        $crawlTree = function (array $node, array $path = []) use (&$crawlTree, $isUrlList) {
            $result = [];

            foreach ($node as $key => $value) {
                if (is_array($value)) {
                    if ($isUrlList($value)) {
                        $result[$key] = [];

                        foreach ($value as $url) {
                            try {
                                $crawler = CrawlerFactory::make($url);
                                $crawler->setSourceData([
                                    'category_1' => $path[0] ?? '',
                                    'category_2' => $path[1] ?? '',
                                    'category_3' => $path[2] ?? '',
                                    'url' => $url,
                                ]);

                                $result[$key][] = $crawler->crawl($url);
                            } catch (Exception $e) {
                                $result[$key][] = [
                                    'url' => $url,
                                    'error' => $e->getMessage(),
                                ];
                            }
                        }
                    } else {
                        $result[$key] = $crawlTree($value, array_merge($path, [$key]));
                    }
                } else {
                    $result[$key] = $value;
                }
            }

            return $result;
        };

        $results = $crawlTree($sources);

        echo '<pre>';

        print_r($results);

        echo '</pre>';

        exit;
    }


});