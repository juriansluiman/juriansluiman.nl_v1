<?php

namespace Application;

use Locale;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
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

        $app  = $e->getApplication();
        $em   = $app->getEventManager();
        $sm   = $app->getServiceManager();

        $config = $sm->get('Config');
        $list   = $config['admin_list'];
        $controllers = array('Ensemble\Admin', 'Soflomo\BlogAdmin\Controller\ArticleController');
        $em->getSharedManager()->attach($controllers, 'dispatch', function() use ($sm, $list) {
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
                $redirect = $plugin->fromRoute(null, array(), array(), true);

                $plugin  = $manager->get('redirect');
                return $plugin->toUrl($url . '?redirect=' . $redirect);
            }
        }, 1000);
    }
}
