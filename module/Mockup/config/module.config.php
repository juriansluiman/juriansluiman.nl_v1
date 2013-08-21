<?php
return array(
    'soflomo_prototype' => array(
        'pages' => array(
            'about-me' => array(
                'route'    => '/about',
                'template' => 'mockup/me',
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);