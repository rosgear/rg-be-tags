<?php
/**
 * Этот файл является частью модуля веб-приложения RosGear.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

namespace Rg\Backend\Tags\Controller;

use Ge\Panel\Controller\ComboTriggerController;

/**
 * Контроллер выпадающего списка.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package namespace Rg\Backend\Tags\Controller
 * @since 1.0
 */
class Trigger extends ComboTriggerController
{
    /**
     * {@inheritdoc}
     */
    protected array $triggerNames = [
        'tags' => 'TagCombo'
    ];
}
