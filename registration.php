<?php

declare(strict_types=1);

use Magento\Framework\Component\ComponentRegistrar;

/**
 * @author    Magedia Team
 * @copyright Copyright (c) 2021 Magedia (https://www.magedia.com)
 * @package   Magedia_DemoNavigation
 * @version   1.0.0
 */

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Magedia_DemoNavigation',
    __DIR__
);
