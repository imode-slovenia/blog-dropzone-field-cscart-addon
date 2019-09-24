<?php

use Tygh\Registry;
use Tygh\Languages\Languages;
use Tygh\BlockManager\Block;
use Tygh\Tools\SecurityHelper;
use Tygh\Storage;

if (!defined('BOOTSTRAP')) { die('Access denied'); }


function fn_get_all_gallery_images($blog_post_id)
{
    $sql = "SELECT * FROM ?:images LEFT JOIN ?:images_links ";
    $sql .= "ON ?:images.image_id = ?:images_links.image_id ";
    $sql .= "WHERE ?:images_links.object_id = '{$blog_post_id}' ";
    $sql .= "AND ?:images_links.object_type = 'blog' AND ?:images_links.type = 'A'";
    
    $images = db_get_array($sql);
    
    if ($images)
        return $images;
        
    return false;    
}

function fn_gallery_update_image($image, $blog_post_id)
{
    
}

function fn_update_blog_gallery_add_link($image_id, $blog_post_id)
{
    $data = [
        'object_id' => $blog_post_id,
        'object_type' => 'blog',
        'image_id' => 0,
        'detailed_id' => $image_id,
        'type' => 'A'
    ];
    
    return db_query("INSERT INTO ?:images_links ?e", $data);
}