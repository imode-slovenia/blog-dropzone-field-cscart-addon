<?php
/***************************************************************************
*                                                                          *
*   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    return;
}

if ($mode == 'view') {

    $page_data = Tygh::$app['view']->getTemplateVars('page');
    
    $blog_post_id = $page_data['page_id'];

    if ($page_data['page_type'] == PAGE_TYPE_BLOG) {

        $additional_images = fn_get_image_pairs($blog_post_id, 'blog', 'A', true, true, DESCR_SL);
        Tygh::$app['view']->assign('additional_images', $additional_images);
    }
}
