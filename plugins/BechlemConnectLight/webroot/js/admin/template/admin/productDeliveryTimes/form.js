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
var ProductDeliveryTimes = function() {
    return {
        init: function() {
            /* Make the widgets sortable using jquery ui */
            $('.connectedSortable').sortable({
                placeholder         : 'sort-highlight',
                connectWith         : '.connectedSortable',
                handle              : '.card-header, .nav-tabs',
                forcePlaceholderSize: true,
                zIndex              : 999999
            })
            $('.connectedSortable .card-header, .connectedSortable .nav-tabs-custom').css('cursor', 'move');

            /* Create slug on the fly */
            $('#title').slug({
                slug:'slug', // class of input / span that contains the generated slug
                hide: false // hide the text input, true by default
            });
        }
    };
}();
