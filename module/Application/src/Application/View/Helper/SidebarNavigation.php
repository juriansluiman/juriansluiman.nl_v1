<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class SidebarNavigation extends AbstractHelper
{
    protected $replacements = array(
        //'Menu label'       => 'Replacement label',
    );

    public function __invoke($class = null)
    {
        $view = $this->getView();
        $menu = $view->navigation()->menu();

        $container = $view->navigation()->getContainer();
        $active    = $view->navigation()->setRenderInvisible(true)->findActive($container);

        if (!$active) {
            return;
        }

        switch ($active['depth']) {
            case 0:
                $container = $active['page'];
                break;
            case 1:
                $container = $active['page']->getParent();
                break;
            case 2:
                $container = $active['page']->getParent()->getParent();
                break;
        }

        $visible = $container->isVisible();
        $html    = $menu->setContainer($container->setVisible(true))
                        ->setUlClass('')
                        ->setOnlyActiveBranch(false)
                        ->setMinDepth(null)
                        ->setMaxDepth(null)
                        ->render();

        $container->setVisible($visible);

        if (strlen($html)) {
            $label = (array_key_exists($container->getLabel(), $this->replacements)) ? $this->replacements[$container->getLabel()] : $container->getLabel();

            return sprintf('<ul %s><li%s><a href="%s">%s</a>%s</li></ul>',
                    (null !== $class) ? ' class="' . $class . '"' : null,
                    ($container->isActive())? ' class="active"' : null,
                    $container->getHref(),
                    $label,
                    $html);
        }
    }
}
