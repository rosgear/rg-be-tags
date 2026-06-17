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
use Ge\Panel\Data\Model\GridModel;

/**
 * Модель данных меток материала.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Rg\Backend\Tags\Model
 * @since 1.0
 */
class Grid extends GridModel
{
    /**
     * Языки.
     * 
     * @var array
     */
    protected array $languages = [];

    /**
     * {@inheritdoc}
     */
    public function getDataManagerConfig(): array
    {
        return [
            'useAudit'   => false,
            'tableName'  => '{{tag}}',
            'primaryKey' => 'id',
            // поля
            'fields' => [
                ['name'], // название
                ['desc'], // описание
                [ // язык
                    'language',
                    'direct' => 'language_id'
                ],
                ['slug'], // слаг
                ['hits'], // хиты
                ['articles'], // количество материала содержащий метку
                ['visible'] // видимый
            ],
            // порядок сортировки
            'order' => ['name' => 'ASC'],
            // сброс автоинкриментов таблиц
            'resetIncrements' => ['{{tag}}', '{{tag_terms}}'],
            // зависимости
            'dependencies' => [
                'delete' => [
                    '{{tag_terms}}' => ['tag_id' => 'id']
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        parent::init();

        // все доступные языки
        $this->languages = Ge::$app->language->available->getAllBy('code');
        $this
            ->on(self::EVENT_AFTER_DELETE, function ($someRecords, $result, $message) {
                // всплывающие сообщение
                $this->response()
                    ->meta
                        ->cmdPopupMsg($message['message'], $message['title'], $message['type']);
                /** @var \Ge\Panel\Controller\GridController $controller */
                $controller = $this->controller();
                // обновить список
                $controller->cmdReloadGrid();
            });
    }

    /**
     * {@inheritdoc}
     */
    public function fetchRow(array $row): array
    {
        // Язык
        if ($row['language_id']) {
            $language = $this->languages[(int) $row['language_id']] ?? null;
            if ($language) {
                $row['language'] = $language['shortName'] . ' (' . $language['slug'] . ')';
            }
        }
        return $row;
    }

    /**
     * {@inheritdoc}
     */
    public function prepareRow(array &$row): void
    {
        // заголовок контекстного меню записи
        $row['popupMenuTitle'] = $row['name'];
    }
}
