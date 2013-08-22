<?php
/**
 * Copyright (c) 2013 Jurian Sluiman.
 * All rights reserved.
 *
 * This license allows for redistribution, commercial and non-commercial, as
 * long as it is passed along unchanged and in whole, with credit to Jurian Sluiman.
 *
 * @author      Jurian Sluiman <jurian@juriansluiman.nl>
 * @copyright   2013 Jurian Sluiman.
 * @license     http://creativecommons.org/licenses/by-nd/3.0/  CC-BY-ND-3.0
 * @link        http://juriansluiman.nl
 */

namespace JsBlog;

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
        $app = $e->getApplication();
        $sm  = $app->getServiceManager();
        $em  = $app->getEventManager();

        $sm->get('Soflomo\Image\Model\Form\FormManager')->setInvokableClass('blog-image', 'JsBlog\Form\ImageUpload');

        $em->getSharedManager()->attach('Soflomo\Image\Model\Service\Image', 'create.post', function($e) use ($sm) {
            $form = $e->getParam('form');

            if (!$form instanceof Form\ImageUpload) {
                return;
            }

            $processor = $sm->get('Soflomo\Image\Processor\Processor');
            $image     = $e->getParam('image');
            $source    = $image->getSource();
            $image->setSource('public/' . trim($source, '/'));


            $variant   = $processor->getVariant('blog');
            $processor->process($image, $variant);

            $variant   = $processor->getVariant('blog-large');
            $processor->process($image, $variant);

            $image->setSource($source);
        });
    }
}