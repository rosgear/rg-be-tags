<?php
/**
 * Модуль веб-приложения RosGear.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

namespace Rg\Backend\Tags;

use Ge;

/**
 * Модуль менеджера меток материала.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Rg\Backend\Tags
 * @since 1.0
 */
class Module extends \Ge\Panel\Module\Module
{
    /**
     * {@inheritdoc}
     */
    public string $id = 'rg.be.tags';
}
