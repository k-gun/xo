<?php
declare(strict_types=1);

namespace arrays;

use arrays\{Type, TypedArray};

/**
 * @package arrays
 * @object  arrays\Set
 * @author  Kerem Güneş <k-gun@mail.com>
 */
class Set extends TypedArray
{
    public function __construct(array $items = null, string $itemsType = null, string $type = null,
        bool $readOnly = false, bool $allowNulls = false)
    {
        self::$notAllowedMethods = ['flip'];

        parent::__construct($type ?? Type::SET, $items, $itemsType, $readOnly, $allowNulls);
    }

    public function search($value) { return $this->_search($value); }
    public function searchLast($value) { return $this->_searchLast($value); }
    public function indexOf($value): ?int { return $this->_indexOf($value); }
    public function lastIndexOf($value): ?int { return $this->_lastIndexOf($value); }

    public function has($value): bool { return $this->_has($value); }
    public function hasKey(int $key): bool { return $this->_hasKey($key); }

    public function set(int $key, $value, int &$size = null): self { return $this->_set($key, $value, $size); }
    public function get(int $key, $valueDefault = null, bool &$ok = null) { return $this->_get($key, $valueDefault, $ok); }

    public function add($value) { return $this->_add($value); }
    public function remove($value, bool &$ok = null): self { return $this->_remove($value, $ok); }
    public function removeAt(int $key, bool &$ok = null): self { return $this->_removeAt($key, $ok); }
    public function removeAll(array $values, int &$count = null): self { return $this->_removeAll($values, $count); }

    public function append($value, int &$size = null): self { return $this->_append($value, $size); }
    public function prepend($value, int &$size = null): self { return $this->_prepend($value, $size); }

    public function pop(int &$size = null) { return $this->_pop($size); }
    public function unpop($value, int &$size = null): self { return $this->_unpop($value, $size); }

    public function shift(int &$size = null) { return $this->_shift($size); }
    public function unshift($value, int &$size = null): self { return $this->_unshift($value, $size); }

    public function put(int $key, $value): self { return $this->_put($key, $value); }
    public function push(int $key, $value): self { return $this->_push($key, $value); }
    public function pull(int $key, $valueDefault = null, bool &$ok = null) { return $this->_pull($key, $valueDefault, $ok); }

    public function find(Closure $func) { return $this->_find($func); }
    public function findKey(Closure $func) { return $this->_findKey($func); }
    public function findIndex(Closure $func) { return $this->_findIndex($func); }

    public function replace($value, $replaceValue, bool &$ok = null): self { return $this->_replace($value, $replaceValue, $ok); }
    public function replaceAt(int $key, $replaceValue, bool &$ok = null): self { return $this->_replaceAt($key, $replaceValue, $ok); }

    public function pad(int $times, $value): self { return $this->_pad($times, $value); }
    public function fill(int $times, $value, int $offset = 0): self { return $this->_fill($times, $value, $offset); }
}
