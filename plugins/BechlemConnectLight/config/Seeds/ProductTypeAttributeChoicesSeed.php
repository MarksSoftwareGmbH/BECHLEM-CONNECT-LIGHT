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
use Cake\I18n\DateTime;
use Migrations\AbstractSeed;

/**
 * ProductTypeAttributeChoices seed.
 */
class ProductTypeAttributeChoicesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $dateTime = DateTime::now();

        $data = [
            [
                'id' => 1,
                'product_type_attribute_id' => 7,
                'value' => 'Active',
                'created' => $dateTime->i18nFormat('yyyy-MM-dd HH:mm:ss'),
                'created_by' => 1,
                'modified' => $dateTime->i18nFormat('yyyy-MM-dd HH:mm:ss'),
                'modified_by' => 1,
                'deleted' => NULL,
                'deleted_by' => NULL,
            ],
            [
                'id' => 2,
                'product_type_attribute_id' => 7,
                'value' => 'Inactive',
                'created' => $dateTime->i18nFormat('yyyy-MM-dd HH:mm:ss'),
                'created_by' => 1,
                'modified' => $dateTime->i18nFormat('yyyy-MM-dd HH:mm:ss'),
                'modified_by' => 1,
                'deleted' => NULL,
                'deleted_by' => NULL,
            ],
        ];

        $table = $this->table('product_type_attribute_choices');
        $table->insert($data)->save();
    }
}
