<?php
declare(strict_types=1);

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
namespace BechlemConnectLight\Controller\Admin;

use BechlemConnectLight\Controller\Admin\AppController;
use BechlemConnectLight\Utility\AppSession\AppSession;
use BechlemConnectLight\Utility\BechlemConnectLight;

/**
 * App Sessions Controller
 *
 * Class AppSessionsController
 * @package BechlemConnectLight\Controller\Admin
 */
class AppSessionsController extends AppController
{

    /**
     * Clear App Caches method
     *
     * @return \Cake\Http\Response|null
     */
    public function clearAppSessions()
    {
        $AppSession = new AppSession();
        BechlemConnectLight::dispatchEvent('Controller.Admin.AppSessions.clearAppSessions', $this, []);
        if ($AppSession->clearAppSession()) {
            $this->Flash->set(
                __d('bechlem_connect_light', 'Session files has been deleted successfully.'),
                ['element' => 'default', 'params' => ['class' => 'success']]
            );

            return $this->redirect(['controller' => 'Dashboards', 'action' => 'dashboard']);
        }

        $this->Flash->set(
            __d('bechlem_connect_light', 'An error occurred. Please, try again.'),
            ['element' => 'default', 'params' => ['class' => 'error']]
        );

        return $this->redirect(['controller' => 'Dashboards', 'action' => 'dashboard']);
    }
}
