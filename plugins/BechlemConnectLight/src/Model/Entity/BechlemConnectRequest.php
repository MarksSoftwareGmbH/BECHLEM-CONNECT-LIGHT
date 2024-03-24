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
namespace BechlemConnectLight\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Text;

/**
 * BechlemConnectRequest Entity
 *
 * @property int $id
 * @property int $bechlem_connect_config_id
 * @property string $name
 * @property string $slug
 * @property string $method
 * @property string $url
 * @property string $data
 * @property string $language
 * @property string $description
 * @property string $example
 * @property string $options
 * @property bool $log
 * @property bool $status
 * @property \Cake\I18n\Time $created
 * @property int $created_by
 * @property \Cake\I18n\Time $modified
 * @property int $modified_by
 * @property \Cake\I18n\Time $deleted
 * @property int $deleted_by
 *
 * @property \BechlemConnectLight\Model\Entity\BechlemConnectConfig $bechlem_connect_config
 */
class BechlemConnectRequest extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected array $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * List of computed or virtual fields that **should** be included in JSON or array
     * representations of this Entity. If a field is present in both _hidden and _virtual
     * the field will **not** be in the array/JSON versions of the entity.
     *
     * @var string[]
     */
    protected array $_virtual = [
        'name_id',
        'name_method',
        'name_url',
    ];

    /**
     * Returns a string with all spaces converted to dashes (by default), accented
     * characters converted to non-accented characters, and non word characters removed.
     *
     * @param string $string the string you want to slug
     * @param string $replacement will replace keys in map
     * @return string
     * @link http://book.cakephp.org/3.0/en/core-libraries/inflector.html#creating-url-safe-strings
     */
    protected function _setName($name)
    {
        $this->set('slug', Text::slug(strtolower($name)));
        return $name;
    }

    /**
     * Get name id method.
     *
     * @return string
     */
    protected function _getNameId()
    {
        if (
            (isset($this->name) && !empty($this->name)) &&
            (isset($this->id) && !empty($this->id))
        ) {
            return $this->name . ' ' . '(' . $this->id . ')';
        }

        return '';
    }

    /**
     * Get name method.
     *
     * @return string
     */
    protected function _getNameMethod()
    {
        if (
            (isset($this->name) && !empty($this->name)) &&
            (isset($this->method) && !empty($this->method))
        ) {
            return $this->name . ' ' . '(' . $this->method . ')';
        }

        return '';
    }

    /**
     * Get name url method.
     *
     * @return string
     */
    protected function _getNameUrl()
    {
        if (
            (isset($this->name) && !empty($this->name)) &&
            (isset($this->url) && !empty($this->url))
        ) {
            return $this->name . ' ' . '(' . $this->url . ')';
        }

        return '';
    }
}
