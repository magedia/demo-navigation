<?php

declare(strict_types=1);

namespace Magedia\DemoNavigation\Block;

use Magento\Backend\Block\Menu;
use Magento\Backend\Block\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Directory\Helper\Data as DirectoryHelper;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Json\Helper\Data as JsonHelper;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\App\State;
use Magento\Framework\App\Area;

class RenderDemoNavigation extends Template
{
    /**
     * @var Menu
     */
    private Menu $menu;

    /**
     * @var StoreManagerInterface
     */
    private StoreManagerInterface $storeManager;

    /**
     * @var State
     */
    private State $state;

    /**
     * @param Context $context
     * @param Menu $menu
     * @param StoreManagerInterface $storeManager
     * @param State $state
     * @param array $data
     * @param JsonHelper|null $jsonHelper
     * @param DirectoryHelper|null $directoryHelper
     */
    public function __construct(
        Template\Context $context,
        Menu $menu,
        StoreManagerInterface $storeManager,
        State $state,
        array $data = [],
        ?JsonHelper $jsonHelper = null,
        ?DirectoryHelper $directoryHelper = null
    ) {
        $this->menu = $menu;
        $this->storeManager = $storeManager;
        $this->state = $state;
        parent::__construct($context, $data, $jsonHelper, $directoryHelper);
    }

    /**
     * @return string
     */
    public function renderDemoNavigation(): string
    {
        $menuModel = $this->getCustomMenuModel();

        return $this->menu->renderNavigation($menuModel->get('Magedia_Core::extensions')->getChildren(), 1, 12);
    }

    /**
     * @return \Magento\Backend\Model\Menu
     */
    private function getCustomMenuModel(): \Magento\Backend\Model\Menu
    {
        return $this->menu->getMenuModel();
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getAdminUrl(): string
    {
        return sprintf('%s/admin', rtrim($this->storeManager->getStore()->getBaseUrl(), '/'));
    }

    /**
     * @return bool
     * @throws LocalizedException
     */
    public function isFrontend(): bool
    {
        return $this->state->getAreaCode() == Area::AREA_FRONTEND;
    }
}
