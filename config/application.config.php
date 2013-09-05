<?php
use Zend\Stdlib\ArrayUtils;

$config = array(
    'modules' => array(
        'Application',
        'DoctrineModule',
        'DoctrineORMModule',
        'ZfcBase',
        'ZfcUser',
        'ZfcUserDoctrineORM',
        'ZfcAdmin',
        'Ensemble\Kernel',
        'Ensemble\KernelDoctrineOrm',
        'Ensemble\Utils',
        'Ensemble\Admin',
        'Soflomo\Common',
        'Soflomo\Image',
        'Soflomo\Purifier',
        'Soflomo\Blog',
        'Soflomo\BlogI18n',
        'Soflomo\Prototype',
        'SlmGoogleAnalytics',
        'SlmException',
        'Template',
        'JsBlog',
        'Mockup',
        'SlmMail',
        'Test',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
);

$local = __DIR__ . '/application.config.local.php';
if (is_readable($local)) {
    $config = ArrayUtils::merge($config, require($local));
}

return $config;
