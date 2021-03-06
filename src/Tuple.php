<?php
/**
 * MIT License <https://opensource.org/licenses/mit>
 *
 * Copyright (c) 2019 Kerem Güneş
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is furnished
 * to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
declare(strict_types=1);

namespace xo;

use xo\{TypedArray, Type};

/**
 * @package xo
 * @object  xo\Tuple
 * @author  Kerem Güneş <k-gun@mail.com>
 */
class Tuple extends TypedArray
{
    /**
     * Constructor.
     * @param array|null  $items
     * @param string|null $itemsType
     * @param bool        $allowNulls
     */
    public function __construct(array $items = null, string $itemsType = null,
        bool $allowNulls = false)
    {
        self::$notAllowedMethods = [
            /* base methods */ 'reset', 'resetItems', 'empty', 'map', 'filter', 'merge', 'reverse', 'shuffle',
            'search', 'searchLast', 'set', 'add', 'remove', 'removeAt', 'removeAll', 'append', 'prepend', 'pop',
            'unpop', 'shift', 'unshift', 'put', 'push', 'pull', 'replace', 'replaceAt', 'flip', 'pad'
        ];

        parent::__construct(Type::TUPLE, $items, $itemsType, $readOnly = true, $allowNulls);
    }

    /**
     * Index of.
     * @param  any $value
     * @return ?int
     */
    public function indexOf($value): ?int
    {
        return $this->_indexOf($value);
    }

    /**
     * Last index of.
     * @param  any $value
     * @return ?int
     */
    public function lastIndexOf($value): ?int
    {
        return $this->_lastIndexOf($value);
    }

    /**
     * Has.
     * @param  any $value
     * @return bool
     */
    public function has($value): bool
    {
        return $this->_has($value);
    }

    /**
     * Has key.
     * @param  int $key
     * @return bool
     */
    public function hasKey(int $key): bool
    {
        return $this->_hasKey($key);
    }

    /**
     * Get.
     * @param  int         $key
     * @param  any|null    $valueDefault
     * @param  bool|null  &$found
     * @return ?any
     */
    public function get($key, $valueDefault = null, bool &$found = null)
    {
        return $this->_get($key, $valueDefault, $found);
    }
}
