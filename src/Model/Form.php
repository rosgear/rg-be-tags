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
use URLify;
use Ge\Panel\Data\Model\FormModel;

/**
 * Модель данных профиля метки материала.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Rg\Backend\Tags\Model
 * @since 1.0
 */
class Form extends FormModel
{
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
                ['id'],
                [ // название
                    'name',
                    'label' => 'Name'
                ],
                [ // описание
                    'desc',
                    'label' => 'Description'
                ],
                [ // идентификатор языка
                    'language_id', 
                    //''
                    'alias' => 'language',
                    'label' => 'Language'
                ],
                [ // слаг метки
                    'slug',
                    'label' => 'Slug'
                ], 
                [ // хиты
                    'hits',
                    'label' => 'Hits'
                ],
                [ // видимость метки
                    'visible',
                    'label' => 'Visible'
                ] 
            ],
            // зависимости
            'dependencies' => [
                'delete' => [
                    '{{tag_terms}}' => ['tag_id' => 'id']
                ]
            ],
            // правила форматирования полей
            'formatterRules' => [
                [['name', 'desc', 'slug'], 'safe'],
                [['visible'], 'logic']
            ],
            // правила проверки полей
            'validationRules' => [
                [['name'], 'notEmpty']
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
                // всплывающие сообщение
                $this->response()
                    ->meta
                        ->cmdPopupMsg($message['message'], $message['title'], $message['type']);
                /** @var \Ge\Panel\Controller\FormController $controller */
                $controller = $this->controller();
                // обновить список
                $controller->cmdReloadGrid();
            })
            ->on(self::EVENT_AFTER_DELETE, function ($result, $message) {
                // всплывающие сообщение
                $this->response()
                    ->meta
                        ->cmdPopupMsg($message['message'], $message['title'], $message['type']);
                /** @var \Ge\Panel\Controller\FormController $controller */
                $controller = $this->controller();
                // обновить список
                $controller->cmdReloadGrid();
            });
    }

    /**
     * Возращает значение для сохранения в поле "slug".
     * 
     * @return string
     */
    public function unSlug(): ?string
    {
        $value = $this->slug ?: $this->name;
        return $this->slug = $value ? URLify::filter($value, 255, '', true) : null;
    }

    /**
     * Устанавливает значение атрибуту "language".
     * 
     * @param null|string|int $value
     * 
     * @return void
     */
    public function setLanguage($value)
    {
        $value = (int) $value;
        $this->attributes['language'] = $value === 0 ? null : $value;
    }

    /**
     * Возвращает значение атрибута "language" для элемента интерфейса формы.
     * 
     * @param null|string|int $value
     * 
     * @return array
     */
    public function outLanguage($value): array
    {
        $language = $value ? Ge::$app->language->available->getBy($value, 'code') : null;
        if ($language) {
            return [
                'type'  => 'combobox', 
                'value' => $language['code'],
                'text'  => $language['shortName'] . ' (' . $language['tag'] . ')'
            ];
        }
        return [
            'type'  => 'combobox',
            'value' => 0,
            'text'  => Ge::t(BACKEND, '[None]')
        ];       
    }
}
