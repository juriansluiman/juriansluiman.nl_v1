<?php

namespace Application;

//use Doctrine\Common\Annotations\AnnotationRegistry;
use Zend\Cache\Storage\Adapter\Apc;

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

    // public function init ()
    // {
    //     $namespace = 'Gedmo\Mapping\Annotation';
    //     $lib       = 'vendor/gedmo/doctrine-extensions/lib/';
    //     AnnotationRegistry::registerAutoloadNamespace($namespace, $lib);
    // }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap($e)
    {
        $list = array(
            //E-mail addresses
        );
        $app  = $e->getApplication();
        $em   = $app->getEventManager();
        $sm   = $app->getServiceManager();

        $em->getSharedManager()->attach('Ensemble\Admin', 'dispatch', function() use ($sm, $list) {
            $auth = $sm->get('zfcuser_auth_service');
            if ($auth->hasIdentity()) {
                $identity = $auth->getIdentity();

                if (!in_array($identity->getEmail(), $list)) {
                    throw new \Exception('You are not authorized to view this page!');
                }
            } else {
                $manager  = $sm->get('Zend\Mvc\Controller\PluginManager');
                $plugin   = $manager->get('url');
                $url      = $plugin->fromRoute('zfcuser/login');
                $redirect = $plugin->fromRoute('zfcadmin');

                $plugin  = $manager->get('redirect');
                return $plugin->toUrl($url . '?redirect=' . $redirect);
            }
        }, 1000);
    }
}
