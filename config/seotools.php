<?php

return [
    'inertia' => env('SEO_TOOLS_INERTIA', false),
    'meta' => [
        'defaults' => [
            'title'        => 'Shilpkala',
            'titleBefore'  => false,
            'description'  => 'Shilpkala - Authentic Indian Handicraft. Handcrafted terracotta idols, diyas, vases, paintings and more by skilled artisans.',
            'separator'    => ' | ',
            'keywords'     => ['handicraft', 'handmade', 'terracotta', 'Indian craft', 'artisan', 'Ganpati', 'diya', 'home decor'],
            'canonical'    => 'current',
            'robots'       => 'index, follow',
        ],
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],
        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        'defaults' => [
            'title'       => 'Shilpkala - Authentic Indian Handicraft',
            'description' => 'Handcrafted products by skilled Indian artisans. Terracotta idols, diyas, vases, paintings and more.',
            'url'         => null,
            'type'        => 'website',
            'site_name'   => 'Shilpkala',
            'images'      => [],
        ],
    ],
    'twitter' => [
        'defaults' => [
            'card' => 'summary_large_image',
        ],
    ],
    'json-ld' => [
        'defaults' => [
            'title'       => 'Shilpkala - Authentic Indian Handicraft',
            'description' => 'Handcrafted products by skilled Indian artisans.',
            'url'         => null,
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
