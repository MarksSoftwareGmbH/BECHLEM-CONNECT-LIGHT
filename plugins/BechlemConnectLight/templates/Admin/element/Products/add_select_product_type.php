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
?>
<div class="input-group-prepend">
    <?= $this->Html->link(
        $this->Html->icon('plus') . ' ' . __d('bechlem_connect_light', 'Add product'),
        [
            'plugin'            => 'BechlemConnectLight',
            'controller'        => 'Products',
            'action'            => 'add',
            'productTypeAlias'  => 'default',
        ],
        [
            'class'         => 'btn btn-' . h($backendButtonColor),
            'type'          => 'button',
            'escapeTitle'   => false
        ]); ?>
</div>
<div class="input-group-prepend">
    <button class="btn btn-<?= h($backendButtonColor); ?> dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?= $this->Html->icon('plus') . ' ' . __d('bechlem_connect_light', 'Add by type'); ?>
    </button>
    <div class="dropdown-menu">
        <?php foreach ($productTypes as $alias => $title): ?>
            <?= $this->Html->link(
                $title,
                [
                    'plugin'            => 'BechlemConnectLight',
                    'controller'        => 'Products',
                    'action'            => 'add',
                    'productTypeAlias'  => h($alias),
                ],
                ['class' => 'dropdown-item']); ?>
        <?php endforeach; ?>
    </div>
</div>
