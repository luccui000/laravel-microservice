<?php

class Item
{
    private $_id;
    private $_name;
    private $_code;
    private $_quantity;
    private $_price;
    private $_length;
    private $_width;
    private $_height;
    private $category;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->_name = $name;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->_code = $code;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->_quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->_price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->_price = $price;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->_length;
    }

    /**
     * @param mixed $length
     */
    public function setLength($length): void
    {
        $this->_length = $length;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->_width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width): void
    {
        $this->_width = $width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->_height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height): void
    {
        $this->_height = $height;
    }

    /**
     * @return mixed
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }
}
