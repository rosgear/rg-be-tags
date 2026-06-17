<?php
/**
 * Этот файл является частью модуля веб-приложения RosGear.
 * 
 * Файл конфигурации Карты SQL-запросов.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

return [
    'drop'   => ['{{tag}}', '{{tag_terms}}'],
    'create' => [
        '{{tag}}' => function () {
            return "CREATE TABLE `{{tag}}` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `language_id` int(11) unsigned DEFAULT NULL,
                `name` varchar(255) DEFAULT NULL,
                `desc` text DEFAULT NULL,
                `image` text DEFAULT NULL,
                `style` text DEFAULT NULL,
                `slug` varchar(255) DEFAULT NULL,
                `counter` int(11) unsigned DEFAULT 0,
                `hits` int(11) unsigned DEFAULT 0,
                `visible` tinyint(1) unsigned DEFAULT 1,
                PRIMARY KEY (`id`)
                ) ENGINE={engine} 
                DEFAULT CHARSET={charset} COLLATE {collate}";
        },

        '{{tag_terms}}' => function () {
            return "CREATE TABLE `{{tag_terms}}` (
                `id` int(11) unsigned NOT NULL,
                `tag_id` int(11) unsigned NOT NULL,
                `term_id` int(11) unsigned NOT NULL,
                `group_id` int(11) unsigned NOT NULL,
                PRIMARY KEY (`id`,`tag_id`,`term_id`)
                ) ENGINE={engine} 
                DEFAULT CHARSET={charset} COLLATE {collate}";
        }
    ],

    'run' => [
        'install'   => ['drop', 'create'],
        'uninstall' => ['drop']
    ]
];