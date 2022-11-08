<?php

class Order
{
    private $_payment_type_id = null;
    private $_note = null;
    private $_from_name = null;
    private $_from_phone = '';
    private $_from_address = '';
    private $_from_ward_name = '';
    private $_from_district_name = '';
    private $_from_province_name = '';
    private $_required_note;
    private $_return_name = '';
    private $_return_phone = '';
    private $_return_address = '';
    private $_return_ward_name = '';
    private $_return_district_name = '';
    private $_return_province_name = '';
    private $_client_order_code = '';
    private $_to_name;
    private $_to_phone;
    private $_to_address;
    private $_to_ward_name;
    private $_to_district_name;
    private $_to_province_name;
    private $_cod_amount = 0;
    private $_content = '';
    private $_weight;
    private $_length;
    private $_width;
    private $_height;
    private $_pick_station_id = null;
    private $_deliver_station_id = null;
    private $_insurance_value = null;
    private $_service_id;
    private $_service_type_id;
    private $_coupon = null;
    private $_pick_shift = null;
    private $_pickup_time = null;
    private $_items = [];

    /**
     * @throws Exception
     */
    public function makeOrder(): array
    {
        if(!$this->_to_name)
            throw new \Exception('Missing to name');
        if(!$this->_to_phone)
            throw new \Exception('Missing to phone');
        if(!$this->_to_address)
            throw new \Exception('Missing to address');
        if(!$this->_to_ward_name)
            throw new \Exception('Missing to ward name');
        if(empty($this->_to_district_name))
            throw new \Exception('Missing to district name');
        if(empty($this->_to_province_name))
            throw new \Exception('Missing to province name');
        if(empty($this->_weight))
            throw new \Exception('Missing weight');
        if(empty($this->_length))
            throw new \Exception('Missing length');
        if(empty($this->_width))
            throw new \Exception('Missing width');
        if(empty($this->_height))
            throw new \Exception('Missing height');
        if(empty($this->_items))
            throw new \Exception('Item must be great than 0');

        return [
            'payment_type_id' => $this->_payment_type_id,
            'note' => $this->_note,
            'from_name' => $this->_from_name,
            'from_phone' => $this->_from_phone,
            'from_address' => $this->_from_address,
            'from_ward_name' => $this->_from_ward_name,
            'from_district_name' => $this->_from_district_name,
            'from_province_name' => $this->_from_province_name,
            'required_note' => $this->_required_note,
            'return_name' => $this->_return_name,
            'return_phone' => $this->_return_phone,
            'return_address' => $this->_return_address,
            'return_ward_name' => $this->_return_ward_name,
            'return_district_name' => $this->_return_district_name,
            'return_province_name' => $this->_return_province_name,
            'client_order_code' => $this->_client_order_code,
            'to_name' => $this->_to_name,
            'to_phone' => $this->_to_phone,
            'to_address' => $this->_to_address,
            'to_ward_name' => $this->_to_ward_name,
            'to_district_name' => $this->_to_district_name,
            'to_province_name' => $this->_to_province_name,
            'cod_amount' => $this->_cod_amount,
            'content' => $this->_content,
            'weight' => $this->_weight,
            'length' => $this->_length,
            'width' => $this->_width,
            'height' => $this->_height,
            'pick_station_id' => $this->_pick_station_id,
            'deliver_station_id' => $this->_deliver_station_id,
            'insurance_value' => $this->_insurance_value,
            'service_id' => $this->_service_id,
            'service_type_id' => $this->_service_type_id,
            'coupon' => $this->_coupon,
            'pick_shift' => $this->_pick_shift,
            'pickup_time' => $this->_pickup_time,
            'items' => $this->_items
        ];
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->_items;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->_items = $items;
    }



    /**
     * @return mixed
     */
    public function getToName()
    {
        return $this->_to_name;
    }

    /**
     * @param mixed $to_name
     */
    public function setToName($to_name): void
    {
        $this->_to_name = $to_name;
    }

    /**
     * @return mixed
     */
    public function getToPhone()
    {
        return $this->_to_phone;
    }

    /**
     * @param mixed $to_phone
     */
    public function setToPhone($to_phone): void
    {
        $this->_to_phone = $to_phone;
    }

    /**
     * @return mixed
     */
    public function getToAddress()
    {
        return $this->_to_address;
    }

    /**
     * @param mixed $to_address
     */
    public function setToAddress($to_address): void
    {
        $this->_to_address = $to_address;
    }

    /**
     * @return mixed
     */
    public function getToWardName()
    {
        return $this->_to_ward_name;
    }

    /**
     * @param mixed $to_ward_name
     */
    public function setToWardName($to_ward_name): void
    {
        $this->_to_ward_name = $to_ward_name;
    }

    /**
     * @return mixed
     */
    public function getToDistrictName()
    {
        return $this->_to_district_name;
    }

    /**
     * @param mixed $to_district_name
     */
    public function setToDistrictName($to_district_name): void
    {
        $this->_to_district_name = $to_district_name;
    }

    /**
     * @return mixed
     */
    public function getToProvinceName()
    {
        return $this->_to_province_name;
    }

    /**
     * @param mixed $to_province_name
     */
    public function setToProvinceName($to_province_name): void
    {
        $this->_to_province_name = $to_province_name;
    }

    /**
     * @return mixed
     */
    public function getCodAmount()
    {
        return $this->_cod_amount;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->_weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight): void
    {
        $this->_weight = $weight;
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
    public function getServiceId()
    {
        return $this->_service_id;
    }

    /**
     * @param mixed $service_id
     */
    public function setServiceId($service_id): void
    {
        $this->_service_id = $service_id;
    }

    /**
     * @return mixed
     */
    public function getServiceTypeId()
    {
        return $this->_service_type_id;
    }

    /**
     * @param mixed $service_type_id
     */
    public function setServiceTypeId($service_type_id): void
    {
        $this->_service_type_id = $service_type_id;
    }

    /**
     * @return mixed
     */
    public function getRequiredNote()
    {
        return $this->_required_note;
    }

    /**
     * @param mixed $required_note
     */
    public function setRequiredNote($required_note): void
    {
        $this->_required_note = $required_note;
    }

}
