<?php

if (!defined('ABSPATH')) {
    exit;
}

return [

    'dt_tour_imports' => function () {

        return "
        CREATE TABLE dt_tour_imports (

            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

            source_url TEXT NOT NULL,

            source_domain VARCHAR(255) NOT NULL,

            source_category VARCHAR(255) DEFAULT '',

            product_id BIGINT UNSIGNED DEFAULT NULL,

            import_status VARCHAR(50) DEFAULT 'pending',

            imported_at DATETIME NULL,

            created_at DATETIME NOT NULL,

            updated_at DATETIME NULL,

            title VARCHAR(255) DEFAULT '',

            content LONGTEXT,

            overview LONGTEXT,

            itinerary LONGTEXT,

            review LONGTEXT,

            price VARCHAR(255) DEFAULT '',

            PRIMARY KEY (id),

            KEY product_id (product_id),

            KEY import_status (import_status)

        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
    },

    'dt_tour_import_images' => function () {

        return "
        CREATE TABLE dt_tour_import_images (

            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

            import_id BIGINT UNSIGNED NOT NULL,

            source_image_url TEXT NOT NULL,

            attachment_id BIGINT UNSIGNED DEFAULT NULL,

            created_at DATETIME NOT NULL,

            PRIMARY KEY (id),

            KEY import_id (import_id),

            KEY attachment_id (attachment_id)

        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
    }

];