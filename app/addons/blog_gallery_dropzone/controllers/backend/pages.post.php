<?php

use Tygh\Registry;
use Tygh\Storage;

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}

if ($mode == 'add') {
} elseif ($mode == 'update') {
    
    $blog_post_id = $_REQUEST['page_id'];
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $additional_images = fn_get_all_gallery_images($blog_post_id);
        Tygh::$app['view']->assign('main_pairs', $additional_images);
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (isset($_REQUEST['file_product_main_image_detailed'])) {
            foreach ($_REQUEST['file_product_main_image_detailed'] as $detailed_image) {
                
                if (Storage::instance('custom_files')->isExist($detailed_image)) {
                    
                    $real_path = Storage::instance('custom_files')->getAbsolutePath($detailed_image);
                    $filename = basename($detailed_image);
                    
                    $image_data = [
                        'name' => $filename,
                        'path' => $real_path,
                        'params' => [
                            'keep_origins' => true,
                        ]
                    ];
                    
                    $image_id = fn_update_image($image_data, 0, 'blog');
                    fn_update_blog_gallery_add_link($image_id, $blog_post_id);
                }
            }
        }
        
        if (isset($_REQUEST['file_product_add_additional_image_detailed'])) {
            foreach ($_REQUEST['file_product_add_additional_image_detailed'] as $additional_image) {
                
                if (Storage::instance('custom_files')->isExist($additional_image)) {
                    
                    $real_path = Storage::instance('custom_files')->getAbsolutePath($additional_image);
                    $filename = basename($additional_image);
                    
                    $image_data = [
                        'name' => $filename,
                        'path' => $real_path,
                        'params' => [
                            'keep_origins' => true,
                        ]
                    ];
                    
                    $image_id = fn_update_image($image_data, 0, 'blog');
                    fn_update_blog_gallery_add_link($image_id, $blog_post_id);
                }
            }
        }
    }
}
