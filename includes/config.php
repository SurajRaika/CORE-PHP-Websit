<?php

/**
 * Used to store website configuration information.
 *
 * @var string or null
 */
function config($key = '')
{
    $config = [
        'name' => 'Taada',
        'site_url' => '',
        'pretty_uri' => false,
        'pages'=>[
            ''=> [
                'nav_menu'=>'Home',
                'page_title'=>'Explore',
            ],
            'about-us'=> [
                'nav_menu'=>'About Us',
                'page_title'=>' ',
            ],
            'products'=> [
                'nav_menu'=>'Products',
                'page_title'=>'Buy User Data',
            ],
            'contact'=> [
                'nav_menu'=>'Contact',
                'page_title'=>'',
            ],
            'service-down'=> [
                'nav_menu'=>'',
                'page_title'=>'service_down',
            ],
        ],
        'template_path' => 'template',
        'content_path' => 'content',
        'version' => 'v3.1',
    ];

    return isset($config[$key]) ? $config[$key] : null;
}
