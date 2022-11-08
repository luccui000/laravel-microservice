<?php

class ItemCollection implements Iterator
{
    private $_items = [];

    public function __construct($items)
    {
        $this->_items = $items;
    }

    public function current()
    {
        return current($this->_items);
    }

    public function next()
    {
        next($this->_items);
    }

    public function key()
    {
        return key($this->_items);
    }

    public function valid()
    {
    }

    public function rewind()
    {
    }
}
