<?php
/**
 * Этот файл является частью модуля веб-приложения RosGear.
 * 
 * Пакет английской (британской) локализации.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

return [
    '{name}'        => 'Tags Manager',
    '{description}' => 'Managing website tags',
    '{permissions}' => [
        'any'       => ['Full access', 'View and make changes to the tags'],
        'view'      => ['View', 'Reading tags'],
        'read'      => ['Reading', 'Reading tags'],
        'add'       => ['Adding', 'Adding tags'],
        'edit'      => ['Editing', 'Editing tags'],
        'delete'    => ['Deleting', 'Deleting tags'],
        'clear'     => ['Clear', 'Deleting all tags']
    ],

    // Form
    '{form.title}' => 'Add tag',
    '{form.titleTpl}' => 'Edit tag "{name}"',

    // Grid: контекстное меню записи
    'Edit record' => 'Edit tag',
    // Grid: столбцы
    'Name' => 'Name',
    'Description' => 'Description',
    'Slug' => 'Slug',
    'A slug is a version of the title, a unique part of the URL. It is all lowercase and only Latin letters, numbers, and hyphens. If not specified, it will be created automatically from the name.' =>
        'A slug is a version of the title, a unique part of the URL. It is all lowercase and only Latin letters, numbers, and hyphens. If not specified, it will be created automatically from the name.',
    'Language' => 'Language',
    'Hits' => 'Hits',
    'Count of hits' => 'Count of hits',
    'Count of articles containing the tag' => 'Count of articles containing the tag',
    'Yes' => 'yes',
    'No' => 'no',
    'View tag' => 'View tag',
    'Visibility' => 'Visibility',
    // Grid: сообщения
    'Tag «{0}» - showen' => 'Tag «{0}» - <b>showen</b>.',
    'Tag «{0}» - hidden' => 'Tag «{0}» - <b>hidden</b>.',
    // Grid: сообщения / заголовки
    'Show' => 'Show',
    'Hide' => 'Hide'
];
