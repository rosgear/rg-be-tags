<?php
/**
 * Этот файл является частью модуля веб-приложения RosGear.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

namespace Rg\Backend\Tags\Model;

use Ge;
use Ge\Panel\Data\Model\FormModel;

/**
 * Модель данных профиля записи метки материала.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Rg\Backend\Tags\Model
 * @since 1.0
 */
class GridRow extends FormModel
{
    /**
     * {@inheritdoc}
     */
    public function getDataManagerConfig(): array
    {
        return [
            'tableName'  => '{{tag}}',
            'primaryKey' => 'id',
            'fields'     => [
                ['id'],
                ['name'],
                ['visible']
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        parent::init();

        $this
            ->on(self::EVENT_AFTER_SAVE, function ($isInsert, $columns, $result, $message) {
                /** @var \Ge\Panel\Http\Response $response */
                $response = $this->response();
                // всплывающие сообщение
                if ($message['success']) {
                    $response
                        ->meta
                            ->cmdPopupMsg(
                                $this->module->t('Tag «{0}» - ' . ($this->visible > 0 ? 'showen' : 'hidden'), [$this->name]),
                                $this->t($this->visible > 0 ? 'Show' : 'Hide'),
                                'accept'
                            );
                } else
                    $response
                        ->meta
                            ->cmdPopupMsg($message['message'], $message['title'], $message['type']);
            });
    }
}
