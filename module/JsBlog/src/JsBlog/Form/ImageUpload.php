<?php
/**
 * Copyright (c) 2013 Jurian Sluiman.
 * All rights reserved.
 *
 * This license allows for redistribution, commercial and non-commercial, as
 * long as it is passed along unchanged and in whole, with credit to Soflomo.
 *
 * @author      Jurian Sluiman <jurian@soflomo.com>
 * @copyright   2013 Jurian Sluiman.
 * @license     http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link        http://soflomo.com
 */

namespace JsBlog\Form;

use Soflomo\Image\Model\Form\DefaultUpload;

class ImageUpload extends DefaultUpload
{
    protected $fileUploadDir = 'public/assets/images/blog/';

    public function getInputFilterSpecification()
    {
        $spec = parent::getInputFilterSpecification();
        $name = $this->getFileInputName();

        return array_merge_recursive($spec, array(
            $name => array(
                'validators' => array(
                    array('name' => 'FileImageSize', 'options' => array(
                        'minWidth' => 450,
                    )),
                ),
            ),
        ));
    }
}