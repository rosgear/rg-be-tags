<?php
/**
 * Этот файл является частью модуля веб-приложения RosGear.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

namespace Rg\Backend\Tags\Model;

use Ge\Panel\Data\Model\Combo\ComboModel;

/**
 * Модель данных выпадающего списка меток материала.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package  Rg\Backend\Tags\Model
 * @since 1.0
 */
class TagCombo extends ComboModel
{
    /**
     * {@inheritdoc}
     */
    public function getDataManagerConfig(): array
    {
        return [
            'tableName'  => '{{tag}}',
            'primaryKey' => 'id',
            'searchBy'   => 'name',
            'order'      => ['name' => 'ASC'],
            'fields'     => [
                ['id'],
                ['name']
            ]
        ];
    }
}