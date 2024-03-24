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
namespace BechlemConnectLight\Controller\Api;

use Cake\Event\Event;

/**
 * Class UserProfilesController
 *
 * @package Api\Controller
 */
class UserProfilesController extends AppController
{

    /**
     * Pagination
     *
     * @var array
     */
    public array $paginate = [
        'limit' => 25,
        'maxLimit' => 50,
        'sortableFields' => [
            'id',
            'user_id',
            'foreign_key',
            'prefix',
            'salutation',
            'suffix',
            'first_name',
            'middle_name',
            'last_name',
            'gender',
            'birthday',
            'website',
            'telephone',
            'mobilephone',
            'fax',
            'company',
            'street',
            'street_addition',
            'postcode',
            'city',
            'country_id',
            'about_me',
            'tags',
            'timezone',
            'image',
            'view_counter',
            'status',
            'created',
            'modified',
        ],
        'order' => ['created' => 'DESC']
    ];

    /**
     * Index method
     *
     * @return mixed
     */
    public function index()
    {
        $this->Crud->on('beforePaginate', function (Event $event) {
            if (
                ($this->getRequest()->getQuery('fields') !== null) &&
                !empty($this->getRequest()->getQuery('fields'))
            ) {
                $select = explode(',', $this->getRequest()->getQuery('fields'));
                $this->paginate($event->getSubject()->query->select($select));
            }
        });

        return $this->Crud->execute();
    }

    /**
     * View method
     *
     * @param int|null $id
     * @return mixed
     */
    public function view(int $id = null)
    {
        $this->Crud->on('beforeFind', function (Event $event) {
            if (
                ($this->getRequest()->getQuery('fields') !== null) &&
                !empty($this->getRequest()->getQuery('fields'))
            ) {
                $select = explode(',', $this->getRequest()->getQuery('fields'));
                $event->getSubject()->query->select($select);
            }
            if (
                ($this->getRequest()->getQuery('contain') !== null) &&
                ($this->getRequest()->getQuery('contain') == 1)
                ) {
                    $event->getSubject()->query->contain([
                        'Users.UserProfileDiaryEntries',
                        'Users.UserProfileTimelineEntries',
                    ]);
                }
        });

        return $this->Crud->execute();
    }
}
