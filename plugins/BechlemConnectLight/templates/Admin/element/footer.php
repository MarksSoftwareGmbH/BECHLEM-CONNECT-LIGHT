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

$backendLinkTextColor = 'navy';
if (Configure::check('BechlemConnectLight.settings.backendLinkTextColor')):
    $backendLinkTextColor = Configure::read('BechlemConnectLight.settings.backendLinkTextColor');
endif;
?>
<footer class="main-footer">
    <strong><?= __d(
        'bechlem_connect_light',
        '&copy; Copyright {date} {link}',
        [
            'date' => $this->Time->format($this->Time->gmt(), 'Y'),
            'link' => $this->Html->link(
                'Marks Software GmbH',
                'https://www.marks-software.de/',
                [
                    'class'         => 'text-' . h($backendLinkTextColor),
                    'target'        => '_blank',
                    'escapeTitle'   => false,
                ]
            ),
        ]); ?></strong>
    <?= __d('bechlem_connect_light', 'All rights reserved.'); ?>
    <div class="float-right d-none d-sm-inline-block">
        <strong><?= __d('bechlem_connect_light',
            'Powered by {bechlemConnectLight}',
            ['bechlemConnectLight' => $this->Html->link(
                'BECHLEM CONNECT LIGHT',
                'https://github.com/MarksSoftwareGmbH/BECHLEM-CONNECT-LIGHT',
                [
                    'class'         => 'text-' . h($backendLinkTextColor),
                    'target'        => '_blank',
                    'escapeTitle'   => false,
                ]
            )]); ?></strong> v<?= Configure::version(); ?>
    </div>
</footer>
