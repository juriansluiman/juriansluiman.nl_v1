<?php

namespace Mockup;

use Zend\Mvc\MvcEvent;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    // public function onBootstrap($e)
    // {
    //     $app = $e->getApplication();
    //     $em  = $app->getEventManager()->getSharedManager();
    //     $sm  = $app->getServiceManager();

    //     $config = $sm->get('Config');
    //     //$list   = $config['my_controller_list'];
    //     $list   = (array) 'Soflomo\Blog\Controller\ArticleController';
    //     $loader = $sm->get('ControllerLoader');

    //     $em->attach('Soflomo\Prototype\Controller\PrototypeController', MvcEvent::EVENT_DISPATCH, function ($e) use ($list, $loader) {
    //         foreach ($list as $name) {
    //             $controller = $loader->get($name);

    //             $e->getTarget()->getEventManager()->attach(MvcEvent::EVENT_DISPATCH, array($controller, 'onDispatch'));
    //         }
    //     }, -100);
    // }
}
