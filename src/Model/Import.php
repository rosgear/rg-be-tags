<?php
/**
 * Этот файл является частью модуля веб-приложения RosGear.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

namespace Rg\Backend\Tags\Model;

/**
 * Импорт меток (тегов).
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Rg\Backend\Tags\Model
 * @since 1.0
 */
class Import extends \Ge\Import\Import
{
    /**
     * {@inheritdoc}
     */
    protected string $modelClass = '\Rg\Backend\Tags\Model\Tag';

    /**
     * {@inheritdoc}
     */
    public function maskedAttributes(): array
    {
        return [
            // идентификатор метки
            'id' => [
                'field' => 'id', 
                'type' => 'int'
            ],
            // идентификатор языка
            'language_id' => [
                'field' => 'language_id', 
                'type'  => 'int'
            ],
            // название
            'name' => [
                'field'  => 'name',
                'length' => 255,
                'trim'   => true
            ],
            // описание
            'desc' => [
                'field' => 'desc',
                'trim'  => true
            ],
            // изображение метки
            'image' => [
                'field' => 'image',
                'trim'  => true
            ],
            // стиль отображения метки
            'style' => [
                'field' => 'style',
                'trim'  => true
            ],
            // слаг метки
            'slug' => [
                'field'  => 'slug', 
                'length' => 255,
                'trim'   => true
            ],
            // количество элементов связанных с меткой
            'counter' => [
                'field' => 'counter', 
                'type'  => 'int'
            ],
            // количество просмотров метки
            'hits' => [
                'field' => 'hits', 
                'type'  => 'int'
            ],
            // видимость метки
            'visible' => [
                'field' => 'visible', 
                'type' => 'int'
            ]
        ];
    }
}
