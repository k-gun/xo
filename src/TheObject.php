<?php
/**
 * MIT License <https://opensource.org/licenses/mit>
 *
 * Copyright (c) 2018 Kerem Güneş
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

namespace objects;

/**
 * @package objects
 * @object  objects\TheObject
 * @author  Kerem Güneş <k-gun@mail.com>
 */
class TheObject
{
    /**
     * Get class.
     * @return object
     */
    public final function getClass(): object
    {
        return $this;
    }

    /**
     * Get name.
     * @return string
     */
    public final function getName(): string
    {
        return static::class;
    }

    /**
     * Get short name.
     * @return string
     */
    public final function getShortName(): string
    {
        return substr($name = static::class,
            (false !== $nssPos = strpos($name, '\\')) ? $nssPos + 1 : 0);
    }

    /**
     * Get value.
     * @return any|null
     */
    public function getValue()
    {
        if (property_exists($this, 'value')) {
            return $this->value;
        }
        return null;
    }

    /**
     * Get value type.
     * @return ?string
     */
    public function getValueType(): ?string
    {
        if (property_exists($this, 'valueType')) {
            return $this->valueType;
        }
        if (property_exists($this, 'value')) {
            return gettype($this->value);
        }
        return null;
    }

    /**
     * Clone.
     * @return object
     */
    public final function clone(): object
    {
        return clone $this;
    }

    /**
     * Equals.
     * @param  object $object
     * @return bool
     */
    public final function equals(object $object): bool
    {
        return $object == $this;
    }

    /**
     * To string.
     * @return string
     */
    public function toString(): string
    {
        return sprintf('object(%s)#%s', $this->getName(), spl_object_id($this));
    }
}
