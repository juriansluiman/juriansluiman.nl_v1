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

return array(
    'navigation' => array(
        'admin' => array(
            'blog' => array(
                'label'  => 'Blog',
                'route'  => 'zfcadmin/blog',
                'params' => array('blog' => 'default'),
            ),
        ),
    ),
);
