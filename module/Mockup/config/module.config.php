<?php
return array(
    'soflomo_prototype' => array(
        'pages' => array(
            'about' => array(
                'route'    => '/about',
                'template' => 'mockup/about',
            ),
            'contact' => array(
                'route'    => '/contact',
                'template' => 'mockup/contact',
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);