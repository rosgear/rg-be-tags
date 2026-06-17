<?php
/**
 * Этот файл является частью модуля веб-приложения RosGear.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

namespace Rg\Backend\Tags\Model;

use Ge\Db\ActiveRecord;

/**
 * Активная запись метки материала.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Rg\Backend\Tags\Model
 * @since 1.0
 */
class Tag extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function primaryKey(): string
    {
        return 'id';
    }

    /**
     * {@inheritdoc}
     */
    public function tableName(): string
    {
        return '{{tag}}';
    }

    /**
     * {@inheritdoc}
     */
    public function maskedAttributes(): array
    {
        return [
            'id'         => 'id', // идентификатор метки
            'languageId' => 'language_id', // идентификатор языка
            'name'       => 'name', // название метки
            'desc'       => 'desc', // описание метки
            'image'      => 'image', // изображение метки
            'style'      => 'style', // стиль отображения метки
            'slug'       => 'slug', // слаг метки
            'counter'    => 'counter', // количество элементов связанных с меткой
            'hits'       => 'hits', // количество просмотров метки
            'visible'    => 'visible' // видимость метки
        ];
    }

    /**
     * Возвращает запись по указанному значению первичного ключа.
     * 
     * @see ActiveRecord::selectByPk()
     * 
     * @param mixed $id Идентификатор записи.
     * 
     * @return null|Tag Активная запись при успешном запросе, иначе `null`.
     */
    public function get(mixed $identifier): ?static
    {
        return $this->selectByPk($identifier);
    }

    /**
     * Возвращает все записи (метки) материала.
     * 
     * Ключом каждой записи является значение первичного ключа {@see ActiveRecord::tableName()} 
     * текущей таблицы.
     * 
     * @see Tags::fetchAll()
     * 
     * @param bool $caching Указывает на принудительное кэширование. Если служба кэширования 
     *     отключена, кэширование не будет выполнено (по умолчанию `true`).
     * 
     * @return array
     */
    public function getAll(bool $caching = true): ?array
    {
        if ($caching)
            return $this->cache(
                function () { return $this->fetchAll($this->primaryKey(), $this->maskedAttributes(), ['visible' => 1]); },
                null,
                true
            );
        else
            return $this->fetchAll($this->primaryKey(), $this->maskedAttributes(), ['visible' => 1]);
    }

    /**
     * Удаляет все записи.
     * 
     * @throws \Ge\Db\Adapter\Driver\Exception\CommandException Невозможно выполнить инструкцию SQL.
     */
    public function deleteAll()
    {
        $this->getDb()
            ->createCommand()
                ->truncateTable($this->tableName())
                ->execute();
    }
}
