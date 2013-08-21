<?php
return array(
    'soflomo_prototype' => array(
        'pages' => array(
            'blog' => array(
                'route'    => '/',
                'template' => 'mockup/home',
            ),
            'blog-post1' => array(
                'route'    => '/interface-injection-with-initializers-in-zend-servicemanager',
                'template' => 'mockup/post1',
            ),
            'blog-post2' => array(
                'route'    => '/using-zend-framework-service-managers-in-your-application',
                'template' => 'mockup/post2',
            ),
            'blog-post3' => array(
                'route'    => '/use-soflomo-prototype-for-quick-website-prototypes',
                'template' => 'mockup/post3',
            ),
            'blog-post4' => array(
                'route'    => '/strategies-for-hydrators-a-practical-use-case',
                'template' => 'mockup/post4',
            ),
            'blog-post5' => array(
                'route'    => '/factories-for-translator-loaders',
                'template' => 'mockup/post5',
            ),
            'blog-post6' => array(
                'route'    => '/the-importance-of-being-away',
                'template' => 'mockup/post6',
            ),
            'about-me' => array(
                'route'    => '/about',
                'template' => 'mockup/me',
            ),
        ),
    ),

    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Blog',
                'route' => 'blog',

                'pages' => array(
                    array(
                        'label' => 'Interface injection with initializers in Zend\ServiceManager',
                        'route' => 'blog-post1'
                    ),
                    array(
                        'label' => 'Interface injection with initializers in Zend\ServiceManager 2',
                        'route' => 'blog-post2'
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

    'service_manager' => array(
        'factories' => array(
            'default' => 'Zend\Navigation\Service\DefaultNavigationFactory',
        ),
    ),
);