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

namespace JsBlog\Factory;

use Soflomo\BlogAdmin\Factory\ArticleFormFactory as BaseFactory;
use Zend\ServiceManager\ServiceLocatorInterface;

class ArticleFormFactory extends BaseFactory
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $form = parent::createService($sl);

        $form->add(array(
            'type'    => 'textarea',
            'name'    => 'description',
        ));
        $form->getInputFilter()->add(array(
            'required' => true,
            'name'     => 'description',
        ));

        return $form;
    }
}