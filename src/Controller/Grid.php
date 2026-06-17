<?php
/**
 * Этот файл является частью модуля веб-приложения RosGear.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

namespace Rg\Backend\Tags\Controller;

use Rg\Backend\Tags\Widget\TabGrid;
use Ge\Panel\Controller\GridController;

/**
 * Контроллер сетки меток материала.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Rg\Backend\Tags\Controller
 * @since 1.0
 */
class Grid extends GridController
{
    /**
     * {@inheritdoc}
     */
    public function createWidget(): TabGrid
    {
        return new TabGrid();
    }
}
