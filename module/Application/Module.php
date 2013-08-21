<?php

namespace Application;

use Locale;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap($e)
    {
        Locale::setDefault('en-GB');

        $purifier = $e->getApplication()->getServiceManager()->get('HTMLPurifier');

        $def  = $purifier->config->getHTMLDefinition(true);;
        $code = $def->addElement('code', 'Block', 'Flow', 'Common');
        $code->excludes = array('code' => true);
    }
}
