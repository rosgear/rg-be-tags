<?php
/**
 * Этот файл является частью модуля веб-приложения RosGear.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

namespace Rg\Backend\Tags\Controller;

use Rg\Backend\Tags\Widget\EditWindow;
use Ge\Panel\Controller\FormController;

/**
 * Контроллер формы метки материала.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Rg\Backend\Tags\Controller
 * @since 1.0
 */
class Form extends FormController
{
    /**
     * {@inheritdoc}
     */
    public function createWidget(): EditWindow
    {
        return new EditWindow();
    }
}
