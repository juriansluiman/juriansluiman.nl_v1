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
        'doctype'                  => 'HTML5',

        'display_not_found_reason' => true,
        'display_exceptions'       => false,

        'not_found_template'       => 'error/page-not-found',
        'exception_template'       => 'error/server-error',

        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),

        'template_map' => array(
            'error/page-not-found'     => __DIR__ . '/../view/error/page-not-found.phtml',
            'error/server-error'       => __DIR__ . '/../view/error/server-error.phtml',
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
