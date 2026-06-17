<?php
/**
 * Этот файл является частью расширения модуля веб-приложения RosGear.
 * 
 * @link https://rosgear.ru/
 * @copyright Copyright (c) 2015 RosGear
 * @license https://rosgear.ru/license/
 */

namespace Rg\Backend\Tags\Widget;

use Ge;
use Ge\Panel\Helper\ExtGrid;
use Ge\Panel\Helper\HtmlGrid;
use Ge\Panel\Helper\HtmlNavigator as HtmlNav;

/**
 * Виджет для формирования интерфейса вкладки с сеткой данных.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Rg\Backend\Tags\Widget
 * @since 1.0
 */
class TabGrid extends \Ge\Panel\Widget\TabGrid
{
    /**
     * {@inheritdoc}
     */
    protected function init(): void
    {
        parent::init();

        // столбцы (Ge.view.grid.Grid.columns GeJS)
        $this->grid->columns = [
            ExtGrid::columnNumberer(),
            ExtGrid::columnAction(),
            [
                'text'      => ExtGrid::columnInfoIcon($this->creator->t('Name')),
                'dataIndex' => 'name',
                'cellTip'   => HtmlGrid::tags([
                    HtmlGrid::header('{name}'),
                    HtmlGrid::tplIf(
                        'desc',
                        HtmlGrid::fieldLabel($this->creator->t('Description'), '{desc}'),
                        ''
                    ),
                    HtmlGrid::fieldLabel($this->creator->t('Slug'), '{slug}'),
                    HtmlGrid::fieldLabel($this->creator->t('Hits'), '{hits}'),
                    HtmlGrid::fieldLabel($this->creator->t('Count of articles containing the tag'), '{articles}'),
                    HtmlGrid::tplIf(
                        'language',
                        HtmlGrid::fieldLabel($this->creator->t('Language'), '{language}'),
                        ''
                    ),
                    HtmlGrid::fieldLabel(
                        $this->creator->t('Visible'),
                        HtmlGrid::tplChecked('visible==1')
                    )
                ]),
                'filter'   => ['type' => 'string'],
                'sortable' => true,
                'width'    => 170
            ],
            [
                'text'      => '#Slug',
                'dataIndex' => 'slug',
                'tooltip'   => '#A slug is a version of the title, a unique part of the URL. It is all lowercase and only Latin letters, numbers, and hyphens. If not specified, it will be created automatically from the name.',
                'cellTip'   => '{slug}',
                'filter'    => ['type' => 'string'],
                'sortable'  => true,
                'width'     => 170
            ],
            [
                'text'      => '#Description',
                'dataIndex' => 'desc',
                'cellTip'   => '{desc}',
                'filter'    => ['type' => 'string'],
                'sortable'  => true,
                'width'     => 220
            ],
            [
                'text'      => '#Language',
                'dataIndex' => 'language',
                'width'     => 120
            ],
            [
                'xtype'    => 'templatecolumn',
                'dataIndex' => 'url', // не используется, но необходим для проверки
                'sortable' => false,
                'width'    => 45,
                'align'    => 'center',
                'tpl'      => HtmlGrid::a(
                    '', 
                    '/tag/{slug}',
                    [
                        'title' => $this->creator->t('View tag'),
                        'class' => 'g-icon g-icon-svg g-icon_size_14 g-icon-m_link g-icon-m_color_default g-icon-m_is-hover',
                        'target' => '_blank'
                    ]
                )
            ],
            [
                'text'      => ExtGrid::columnIcon('rg-tags__icon-hits', 'svg'),
                'dataIndex' => 'hits',
                'filter'    => ['type' => 'number'],
                'tooltip'   => '#Count of hits',
                'align'     => 'center',
                'width'     => 50
            ],
            [
                'text'      => ExtGrid::columnIcon('rg-tags__icon-articles', 'svg', 16, ''),
                'dataIndex' => 'articles',
                'filter'    => ['type' => 'number'],
                'tooltip'   => '#Count of articles containing the tag',
                'align'     => 'center',
                'width'     => 50
            ],
            [
                'text'      => ExtGrid::columnIcon('g-icon-m_visible', 'svg'),
                'xtype'     => 'g-gridcolumn-switch',
                'filter'    => ['type' => 'boolean'],
                'tooltip'   => '#Visibility',
                'selector'  => 'grid',
                'collectData' => ['name'],
                'dataIndex' => 'visible'
            ]
        ];

        // панель инструментов (Ge.view.grid.Grid.tbar GeJS)
        $this->grid->tbar = [
            'padding' => 1,
            'items'   => ExtGrid::buttonGroups([
                'edit' => [
                    'items' => [
                        // инструмент "Добавить"
                        'add' => [
                            //'caching' => false
                        ],
                        'delete',
                        'cleanup',
                        '-',
                        'edit',
                        'select',
                        '-',
                        'refresh'
                    ]
                ],
                'columns',
                'search'
            ])
        ];

        // контекстное меню записи (Ge.view.grid.Grid.popupMenu GeJS)
        $this->grid->popupMenu = [
            'cls'        => 'g-gridcolumn-popupmenu',
            'titleAlign' => 'center',
            'width'      => 150,
            'items'      => [
                [
                    'text'        => '#Edit record',
                    'iconCls'     => 'g-icon-svg g-icon-m_edit g-icon-m_color_default',
                    'handlerArgs' => [
                        'route'   => Ge::alias('@match', '/form/view/{id}'),
                        'pattern' => 'grid.popupMenu.activeRecord'
                    ],
                    'handler' => 'loadWidget'
                ]
            ]
        ];

        // 2-й клик по строке сетки
        $this->grid->rowDblClickConfig = [
            'allow' => true,
            'route' => Ge::alias('@match', '/form/view/{id}')
        ];
        // количество строк в сетке
        $this->grid->store->pageSize = 50;
        // поле аудита записи
        $this->grid->logField = 'name';
        // плагины сетки
        $this->grid->plugins = 'gridfilters';
        // класс CSS применяемый к элементу body сетки
        $this->grid->bodyCls = 'g-grid_background';

        // панель навигации (Ge.view.navigator.Info GeJS)
        $this->navigator->info['tpl'] = HtmlNav::tags([
            HtmlNav::header('{name}'),
            HtmlNav::tplIf(
                'desc',
                HtmlNav::fieldLabel($this->creator->t('Description'), '{desc}'),
                ''
            ),
            HtmlNav::fieldLabel($this->creator->t('Slug'), '{slug}'),
            HtmlNav::fieldLabel($this->creator->t('Hits'), '{hits}'),
            HtmlNav::fieldLabel($this->creator->t('Count of articles containing the tag'), '{articles}'),
            HtmlNav::tplIf(
                'language',
                HtmlNav::fieldLabel($this->creator->t('Language'), '{language}'),
                ''
            ),
            HtmlNav::fieldLabel(
                $this->creator->t('Visible'),
                HtmlNav::tplChecked('visible==1')
            ),
            HtmlNav::widgetButton(
                $this->creator->t('Edit record'),
                ['route' => Ge::alias('@match', '/form/view/{id}'), 'long' => true],
                ['title' => $this->creator->t('Edit record')]
            )
        ]);

        $this
            ->addCss(GE_DEBUG ? '/grid.css' : '/grid.min.css')
            ->addRequire('Ge.view.grid.column.Switch');
    }
}
