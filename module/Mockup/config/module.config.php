<?php
return array(
    'soflomo_prototype' => array(
        'pages' => array(
            'home' => array(
                'route'    => '/',
                'template' => 'mockup/home'
            ),
            'item' => array(
                'route'    => '/item',
                'template' => 'mockup/item/item'
            ),
            'item-subItem' => array(
                'route'    => '/item/sub-item',
                'template' => 'mockup/item/subItem'
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

    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Home',
                'route' => 'home',
            ),
            array(
                'label' => 'Item',
                'route' => 'item',
                //'visible'=> false,
                'pages' => array(
                    array(
                        'label' => 'Sub Item',
                        'route' => 'item-subItem'
                    )
                )
            ),
        )
    ),
);