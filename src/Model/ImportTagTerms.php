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
 * Импорт меток (тегов) терминов.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Rg\Backend\Tags\Model
 * @since 1.0
 */
class ImportTagTerms extends \Ge\Import\Import
{
    /**
     * {@inheritdoc}
     */
    protected string $modelClass = '\Rg\Backend\Tags\Model\TagTerms';

    /**
     * {@inheritdoc}
     */
    public function maskedAttributes(): array
    {
        return [
            // идентификатор связываемой записи
            'id' => [
                'field' => 'id', 
                'type' => 'int'
            ],
            // идентификатор метки (тега)
            'tag_id' => [
                'field' => 'tag_id', 
                'type'  => 'int'
            ],
            // идентификатор термина
            'term_id' => [
                'field' => 'term_id', 
                'type'  => 'int'
            ],
            // идентификатор группы
            'group_id' => [
                'field' => 'group_id', 
                'type'  => 'int'
            ]
        ];
    }
}
