<?php
return array(
    'soflomo_blog' => array(
        'recent_listing_limit'  => 4,
        'archive_listing_limit' => 10,
    ),

    'ensemble_kernel' => array(
        'routes' => array(
            'blog' => array(
                'child_routes'  => array(
                    'view' => array(
                        'options' => array(
                            'route'    => 'article/:article[/:slug]',
                        ),
                    ),
                    'archive' => array(
                        'options' => array(
                            'route'    => 'archive[/:page]',
                        ),
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    'soflomo_image' => array(
        'variants'  => array(
            'blog-large' => array(
                'quality' => array('quality' => 30),
                'resize'  => array('length'  => 2*576),
                'sharpen' => array('radius' =>2, 'sigma' => 0.5, 'amount' => 2, 'threshold' => 0),
            ),

            'blog' => array(
                'quality' => array('quality' => 30),
                'resize'  => array('length'  => 576),
                'sharpen' => array('radius' =>2, 'sigma' => 0.5, 'amount' => 2, 'threshold' => 0),
            ),
        ),
    ),
);
