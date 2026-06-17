<?php
/**
 * Этот файл является частью модуля веб-приложения RosGear.
 * 
 * Пакет русской локализации.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

return [
    '{name}'        => 'Менеджер меток',
    '{description}' => 'Управления метками веб-сайта',
    '{permissions}' => [
        'any'       => ['Полный доступ', 'Просмотр и внесение изменений в метки'],
        'view'      => ['Просмотр', 'Просмотр элементов меток'],
        'read'      => ['Чтение', 'Чтение меток'],
        'add'       => ['Добавление', 'Добавление меток'],
        'edit'      => ['Изменение', 'Изменение меток'],
        'delete'    => ['Удаление', 'Удаление меток'],
        'clear'     => ['Очистка', 'Удаление всех меток']
    ],

    // Form
    '{form.title}' => 'Добавление метки',
    '{form.titleTpl}' => 'Изменение метки "{name}"',

    // Grid: контекстное меню записи
    'Edit record' => 'Редактировать',
    // Grid: столбцы
    'Name' => 'Название',
    'Description' => 'Описание',
    'Slug' => 'Слаг',
    'A slug is a version of the title, a unique part of the URL. It is all lowercase and only Latin letters, numbers, and hyphens. If not specified, it will be created automatically from the name.' =>
        'Cлаг - это версия названия, уникальная часть URL-адреса. Это все строчные буквы и только буквы на латинице, цифры и дефисы. Если не указан, он будет создан автоматически из названия.',
    'Language' => 'Язык',
    'Hits' => 'Переходы',
    'Count of hits' => 'Количество переходов',
    'Count of articles containing the tag' => 'Количество материала содержащий метку',
    'Yes' => 'да',
    'No' => 'нет',
    'View tag' => 'Просмотреть страницу метки',
    'Visibility' => 'Видимость',
    // Grid: сообщения
    'Tag «{0}» - showen' => 'Метка «{0}» - <b>показана</b>.',
    'Tag «{0}» - hidden' => 'Метка «{0}» - <b>скрыта</b>.',
    // Grid: сообщения / заголовки
    'Show' => 'Показать',
    'Hide' => 'Скрыть'
];
