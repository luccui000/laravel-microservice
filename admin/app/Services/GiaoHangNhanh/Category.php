<?php

class Category
{
    private $_level1;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getLevel1()
    {
        return $this->_level1;
    }

    /**
     * @param mixed $level1
     */
    public function setLevel1($level1): void
    {
        $this->_level1 = $level1;
    }

}
