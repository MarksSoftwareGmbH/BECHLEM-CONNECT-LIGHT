<?php

/* 
 * MIT License
 *
 * Copyright (c) 2018-present, Marks Software GmbH (https://www.marks-software.de/)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */
use Cake\Core\Configure;

// Get session object
$session = $this->getRequest()->getSession();

$backendButtonColor = 'light';
if (Configure::check('BechlemConnectLight.settings.backendButtonColor')):
    $backendButtonColor = Configure::read('BechlemConnectLight.settings.backendButtonColor');
endif;

// Title
$this->assign('title', $this->BechlemConnectLight->readCamel($this->getRequest()->getParam('controller'))
    . ' :: '
    . ucfirst($this->BechlemConnectLight->readCamel($this->getRequest()->getParam('action')))
);
// Breadcrumb
$this->Breadcrumbs->add([
    [
        'title' => __d('bechlem_connect_light', 'Dashboard'),
        'url' => [
            'plugin'        => 'BechlemConnectLight',
            'controller'    => 'Dashboards',
            'action'        => 'dashboard',
        ]
    ],
    ['title' => $this->BechlemConnectLight->readCamel($this->getRequest()->getParam('controller'))]
]); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <?= $this->Form->create(null, [
                    'url' => [
                        'plugin'        => 'BechlemConnectLight',
                        'controller'    => 'BechlemProducts',
                        'action'        => 'index',
                    ],
                ]); ?>
                <?php $this->Form->setTemplates(['inputGroupText' => '{{content}}']); ?>
                <?= $this->Form->control('search', [
                    'type'          => 'text',
                    'value'         => $this->getRequest()->getQuery('search'),
                    'label'         => false,
                    'placeholder'   => __d('bechlem_connect_light', 'Search') . '...',
                    'prepend'       => $this->Form->postLink(
                        $this->Html->icon('cloud-download-alt') . ' ' . __d('bechlem_connect_light', 'Load all'),
                        [
                            'plugin'        => 'BechlemConnectLight',
                            'controller'    => 'BechlemProducts',
                            'action'        => 'updateAll',
                        ],
                        [
                            'confirm'   => __d('bechlem_connect_light', 'Are you sure you want update all products?'),
                            'block'     => true,
                            'class'     => 'run btn btn-' . h($backendButtonColor),
                            'escape'    => false,
                        ]
                    ),
                    'append' => $this->Form->button(
                            __d('bechlem_connect_light', 'Filter'),
                            ['class' => 'btn btn-' . h($backendButtonColor)]
                        )
                        . ' '
                        . $this->Html->link(
                            __d('bechlem_connect_light', 'Reset'),
                            [
                                'plugin'        => 'BechlemConnectLight',
                                'controller'    => 'BechlemProducts',
                                'action'        => 'index',
                            ],
                            [
                                'class'     => 'btn btn-' . h($backendButtonColor),
                                'escape'    => false,
                            ]
                        )
                        . ' '
                        . '<div class="btn-group dropleft">'
                        . $this->Html->link(
                            $this->Html->tag('span', '', ['class' => 'caret']) . ' ' . $this->Html->icon('download') . ' ' . __d('bechlem_connect_light', 'Download'),
                            '#',
                            [
                                'type'          => 'button',
                                'class'         => 'dropdown-toggle btn btn-' . h($backendButtonColor),
                                'id'            => 'dropdownMenu',
                                'data-toggle'   => 'dropdown',
                                'aria-haspopup' => true,
                                'aria-expanded' => false,
                                'escapeTitle'   => false,
                                'title'         => __d('bechlem_connect_light', 'Download'),
                            ]
                        )
                        . '<div class="dropdown-menu" aria-labelledby="dropdownMenu">'
                        . $this->Html->link(
                            __d('bechlem_connect_light', 'XLSX'),
                            [
                                'plugin'        => 'BechlemConnectLight',
                                'controller'    => 'BechlemProducts',
                                'action'        => 'exportXlsx',
                            ],
                            [
                                'class'         => 'dropdown-item',
                                'escapeTitle'   => false,
                                'title'         => __d('bechlem_connect_light', 'Export & download XLSX'),
                            ])
                        . $this->Html->link(
                            __d('bechlem_connect_light', 'CSV'),
                            [
                                'plugin'        => 'BechlemConnectLight',
                                'controller'    => 'BechlemProducts',
                                'action'        => 'exportCsv',
                                '_ext'          => 'csv',
                            ],
                            [
                                'class'         => 'dropdown-item',
                                'escapeTitle'   => false,
                                'title'         => __d('bechlem_connect_light', 'Export & download CSV'),
                            ])
                        . $this->Html->link(
                            __d('bechlem_connect_light', 'XML'),
                            [
                                'plugin'        => 'BechlemConnectLight',
                                'controller'    => 'BechlemProducts',
                                'action'        => 'exportXml',
                                '_ext'          => 'xml',
                            ],
                            [
                                'class'         => 'dropdown-item',
                                'escapeTitle'   => false,
                                'title'         => __d('bechlem_connect_light', 'Export & download XML'),
                            ])
                        . $this->Html->link(
                            __d('bechlem_connect_light', 'JSON'),
                            [
                                'plugin'        => 'BechlemConnectLight',
                                'controller'    => 'BechlemProducts',
                                'action'        => 'exportJson',
                                '_ext'          => 'json',
                            ],
                            [
                                'class'         => 'dropdown-item',
                                'escapeTitle'   => false,
                                'title'         => __d('bechlem_connect_light', 'Export & download JSON'),
                            ])
                        . '</div>'
                        . '</div>',
                ]); ?>
                <?= $this->Form->end(); ?>
                <?= $this->fetch('postLink'); ?>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover text-nowrap" id="slideActionsTable">
                    <thead>
                    <tr>
                        <th><small><strong><?= __d('bechlem_connect_light', 'Image'); ?></strong></small></th>
                        <th><small><strong><?= $this->Paginator->sort('bechlem_id', __d('bechlem_connect_light', 'Bechlem id')); ?></strong></small></th>
                        <th><small><strong><?= $this->Paginator->sort('your_sku', __d('bechlem_connect_light', 'Your sku')); ?></strong></small></th>
                        <th><small><strong><?= $this->Paginator->sort('manufacturer_sku', __d('bechlem_connect_light', 'Manufacturer sku')); ?></strong></small></th>
                        <th><small><strong><?= $this->Paginator->sort('ean', __d('bechlem_connect_light', 'EAN')); ?></strong></small></th>
                        <th><small><strong><?= $this->Paginator->sort('modified', __d('bechlem_connect_light', 'Modified')); ?></strong></small></th>
                        <th class="actions"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($bechlemProducts as $bechlemProduct): ?>
                        <tr>
                            <td><?= empty($bechlemProduct->image)? '-': $this->BechlemConnectLight->bechlemCsdPicture(h($bechlemProduct->image)); ?></td>
                            <td><?= $this->Html->link(
                                    h($bechlemProduct->bechlem_id),
                                    [
                                        'plugin'        => 'BechlemConnectLight',
                                        'controller'    => 'BechlemProducts',
                                        'action'        => 'view',
                                        'id'            => h($bechlemProduct->id),
                                    ],
                                    [
                                        'title'         => __d('bechlem_connect_light', 'View'),
                                        'data-toggle'   => 'tooltip',
                                        'escape'        => false,
                                    ]); ?></td>
                            <td><?= $this->Html->link(
                                    h($bechlemProduct->your_sku),
                                    [
                                        'plugin'        => 'BechlemConnectLight',
                                        'controller'    => 'BechlemProducts',
                                        'action'        => 'view',
                                        'id'            => h($bechlemProduct->id),
                                    ],
                                    [
                                        'title'         => __d('bechlem_connect_light', 'View'),
                                        'data-toggle'   => 'tooltip',
                                        'escape'        => false,
                                    ]); ?></td>
                            <td><?= $this->Html->link(
                                    h($bechlemProduct->manufacturer_sku),
                                    [
                                        'plugin'        => 'BechlemConnectLight',
                                        'controller'    => 'BechlemProducts',
                                        'action'        => 'view',
                                        'id'            => h($bechlemProduct->id),
                                    ],
                                    [
                                        'title'         => __d('bechlem_connect_light', 'View'),
                                        'data-toggle'   => 'tooltip',
                                        'escape'        => false,
                                    ]); ?></td>
                            <td><?= $this->Html->link(
                                    h($bechlemProduct->ean),
                                    [
                                        'plugin'        => 'BechlemConnectLight',
                                        'controller'    => 'BechlemProducts',
                                        'action'        => 'view',
                                        'id'            => h($bechlemProduct->id),
                                    ],
                                    [
                                        'title'         => __d('bechlem_connect_light', 'View'),
                                        'data-toggle'   => 'tooltip',
                                        'escape'        => false,
                                    ]); ?></td>
                            <td><?= h($bechlemProduct->modified->format('d.m.Y H:i:s')); ?></td>
                            <td class="actions">
                                <div class="actions-links" style="display: block;">
                                <?= $this->Html->link(
                                    $this->Html->icon('eye'),
                                    [
                                        'plugin'        => 'BechlemConnectLight',
                                        'controller'    => 'BechlemProducts',
                                        'action'        => 'view',
                                        'id'            => h($bechlemProduct->id),
                                    ],
                                    [
                                        'title'         => __d('bechlem_connect_light', 'View {bechlemId}', ['bechlemId' => h($bechlemProduct->bechlem_id)]),
                                        'data-toggle'   => 'tooltip',
                                        'escape'        => false,
                                    ]); ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?= $this->element('paginator'); ?>
        </div>
    </div>
</div>
<?= $this->element('please_wait'); ?>
<?= $this->Html->script('BechlemConnectLight.admin/template/admin/default', ['block' => 'scriptBottom']); ?>
<?= $this->Html->scriptBlock(
    '$(function() {
        Default.init();
        $(\'.run\').on(\'click\', function () {
            $(\'#pleaseWait\').modal(\'show\');
        });
    });',
    ['block' => 'scriptBottom']); ?>
