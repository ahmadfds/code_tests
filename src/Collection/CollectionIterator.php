<?php

namespace Metro\Collection;

class CollectionIterator implements \Iterator, \ArrayAccess
{
    protected int $position = 0;
    private array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function current()
    {
        return $this->items[$this->position];
    }

    public function next()
    {
        $this->position++;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->items[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->items[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->items[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }
}