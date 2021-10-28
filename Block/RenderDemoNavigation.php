<?php

declare(strict_types=1);

namespace Magedia\DemoNavigation\Block;

use Magento\Backend\Block\Template;
use Magento\Backend\Block\Menu;
use Magento\Directory\Helper\Data as DirectoryHelper;
use Magento\Framework\Json\Helper\Data as JsonHelper;

class RenderDemoNavigation extends Template
{
    /**
     * @var Menu
     */
    private Menu $menu;

    /**
     * @param Template\Context $context
     * @param array $data
     * @param JsonHelper|null $jsonHelper
     * @param DirectoryHelper|null $directoryHelper
     * @param Menu $menu
     */
    public function __construct(
        Template\Context $context,
        array $data = [],
        ?JsonHelper $jsonHelper = null,
        ?DirectoryHelper $directoryHelper = null,
        Menu $menu
    ) {
        $this->menu = $menu;
        parent::__construct($context, $data, $jsonHelper, $directoryHelper);
    }

    /**
     * @return string
     */
    public function renderDemoNavigation(): string
    {
        $menuModel = $this->getCustomMenuModel();

        return $this->menu->renderNavigation($menuModel->get('Magedia_Core::extensions')->getChildren(), 1 , 12);
    }

    /**
     * @return \Magento\Backend\Model\Menu
     */
    private function getCustomMenuModel(): \Magento\Backend\Model\Menu
    {
        return $this->menu->getMenuModel();
    }
}
