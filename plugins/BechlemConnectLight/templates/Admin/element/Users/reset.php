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
    . ucfirst($this->getRequest()->getParam('action'))
); ?>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <?= $this->element('flash'); ?>
                <div class="login-logo">
                    <?= $this->Html->link(
                        $this->Html->image(
                            'logo.png', [
                            'alt'   => __d('bechlem_connect_light', 'Logo'),
                            'class' => 'img-fluid',
                        ]),
                        '/',
                        ['escapeTitle' => false]); ?>
                </div>
                <p class="login-box-msg">
                    <?= __d('bechlem_connect_light', 'Password reset'); ?>
                </p>
                <?php $this->Form->setTemplates([
                    'inputContainer'        => '{{content}}{{help}}',
                    'inputGroupContainer'   => '<div class="input-group mb-3">{{prepend}}{{content}}{{append}}</div>',
                ]); ?>
                <?= $this->Form->create(null, [
                    'url' => [
                        'plugin'        => 'BechlemConnectLight',
                        'controller'    => 'Users',
                        'action'        => 'reset',
                        'username'      => $this->getRequest()->getParam('username'),
                        'token'         => $this->getRequest()->getParam('token'),
                    ],
                    'class' => 'form-login',
                ]); ?>
                <?= $this->Form->control('password', [
                    'append'        => $this->Html->icon('lock'),
                    'type'          => 'password',
                    'label'         => false,
                    'required'      => true,
                    'placeholder'   => __d('bechlem_connect_light', 'Password'),
                    'minlength'     => 8,
                    'maxlength'     => 249,
                    'class'         => 'shadow rounded',
                ]); ?>
                <?= $this->Form->control('verify_password', [
                    'append'        => $this->Html->icon('lock'),
                    'type'          => 'password',
                    'label'         => false,
                    'required'      => true,
                    'placeholder'   => __d('bechlem_connect_light', 'Verify password'),
                    'minlength'     => 8,
                    'maxlength'     => 249,
                    'class'         => 'shadow rounded',
                ]); ?>
                <?= $this->Form->control('captcha_result', [
                    'append'        => $this->Html->icon('plus-square'),
                    'type'          => 'number',
                    'label'         => false,
                    'required'      => true,
                    'placeholder'   => $session->read('BechlemConnectLight.Captcha.digit_one')
                        . ' '
                        . '+'
                        . ' ' . $session->read('BechlemConnectLight.Captcha.digit_two')
                        . ' ' . '('
                        . __d('bechlem_connect_light', 'Please calculate this addition')
                        . ')',
                    'class'         => 'shadow rounded',
                ]); ?>
                <div class="row">
                    <div class="col-12">
                        <?= $this->Html->link(
                            __d('bechlem_connect_light', 'Home'),
                            '/',
                            [
                                'class'         => 'shadow rounded btn btn-' . h($backendButtonColor),
                                'escapeTitle'   => false,
                            ]); ?>
                        <?= $this->Form->button(
                            __d('bechlem_connect_light', 'Reset'),
                            [
                                'class'         => 'float-right shadow rounded btn btn-outline-success',
                                'escapeTitle'   => false,
                            ]); ?>
                    </div>
                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
    <?= $this->Html->script([
        'BechlemConnectLight./adminlte/plugins/jquery/jquery.min',
        'BechlemConnectLight./adminlte/plugins/jquery-ui/jquery-ui.min'
    ], ['block' => 'scripts']); ?>
    <?= $this->Html->scriptBlock("$.widget.bridge('uibutton', $.ui.button)", ['block' => 'scripts']); ?>
    <?= $this->Html->script([
        'BechlemConnectLight./adminlte/plugins/bootstrap/js/bootstrap.bundle.min',
        'BechlemConnectLight./adminlte/plugins/jquery-validation/jquery.validate.min',
        'BechlemConnectLight./adminlte/plugins/jquery-validation/additional-methods.min',
        'BechlemConnectLight./adminlte/plugins/jqvmap/jquery.vmap.min',
        'BechlemConnectLight./adminlte/plugins/jqvmap/maps/jquery.vmap.world',
        'BechlemConnectLight./adminlte/plugins/jquery-knob/jquery.knob.min',
        'BechlemConnectLight./adminlte/plugins/moment/moment.min',
        'BechlemConnectLight./adminlte/plugins/daterangepicker/daterangepicker',
        'BechlemConnectLight./adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min',
        'BechlemConnectLight./adminlte/plugins/summernote/summernote-bs4.min',
        'BechlemConnectLight./adminlte/plugins/select2/js/select2.full.min',
        'BechlemConnectLight./adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min',
        'BechlemConnectLight./adminlte/dist/js/adminlte.min',
    ], ['block' => 'scripts']); ?>
    <?= $this->Html->scriptBlock(
        '$(function() {
            $(\'.form-login\').validate({
                rules: {
                    password: {
                        required: true
                    },
                    verify_password: {
                        required: true
                    }
                },
                messages: {
                    password: {
                        required: \'' . __d('bechlem_connect_light', 'Please enter a valid password') . '\'
                    },
                    verify_password: {
                        required: \'' . __d('bechlem_connect_light', 'Please verify the password') . '\'
                    }
                },
                errorElement: \'span\',
                errorPlacement: function (error, element) {
                    error.addClass(\'invalid-feedback\');
                    element.closest(\'.form-group\').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass(\'is-invalid\');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass(\'is-invalid\');
                }
            });
        });', ['block' => 'scriptBottom']); ?>
    <?= $this->fetch('scripts'); ?>
    <?= $this->fetch('scriptBottom'); ?>
</body>