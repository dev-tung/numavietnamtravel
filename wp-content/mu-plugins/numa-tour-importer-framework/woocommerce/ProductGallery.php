<?php

class ProductGallery
{
    public function import(
        int $productId,
        array $images
    ): void {

        if (empty($images)) {
            return;
        }

        $storageDir = dirname(__DIR__) . '/storage/images';

        $attachmentIds = [];

        foreach ($images as $filename) {

            $file = $storageDir . '/' . $filename;

            if (!file_exists($file)) {
                continue;
            }

            $attachmentId = $this->createAttachment(
                $file,
                $productId
            );

            if ($attachmentId) {
                $attachmentIds[] = $attachmentId;
            }
        }

        if (empty($attachmentIds)) {
            return;
        }

        set_post_thumbnail(
            $productId,
            $attachmentIds[0]
        );

        update_post_meta(
            $productId,
            '_product_image_gallery',
            implode(
                ',',
                array_slice(
                    $attachmentIds,
                    1
                )
            )
        );
    }

    protected function createAttachment(
        string $file,
        int $productId
    ): int {

        global $wpdb;

        $filename = basename($file);

        $existing = $wpdb->get_var(
            $wpdb->prepare(
                "
                SELECT post_id
                FROM {$wpdb->postmeta}
                WHERE meta_key = '_numa_source_file'
                AND meta_value = %s
                LIMIT 1
                ",
                $filename
            )
        );

        if ($existing) {
            return (int) $existing;
        }

        require_once ABSPATH . 'wp-admin/includes/image.php';
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';

        $upload = wp_upload_bits(
            $filename,
            null,
            file_get_contents($file)
        );

        if (!empty($upload['error'])) {
            return 0;
        }

        $attachmentId = wp_insert_attachment(
            [
                'post_mime_type' => mime_content_type(
                    $upload['file']
                ),
                'post_title' => preg_replace(
                    '/\.[^.]+$/',
                    '',
                    $filename
                ),
                'post_status' => 'inherit',
            ],
            $upload['file'],
            $productId
        );

        if (!$attachmentId) {
            return 0;
        }

        $metadata = wp_generate_attachment_metadata(
            $attachmentId,
            $upload['file']
        );

        wp_update_attachment_metadata(
            $attachmentId,
            $metadata
        );

        update_post_meta(
            $attachmentId,
            '_numa_source_file',
            $filename
        );

        return $attachmentId;
    }
}