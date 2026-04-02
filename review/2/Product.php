<?php
class Product
{
    private $code;
    private $name;
    private $price;
    private $stock;

    public function __construct($code, $name, $price, $stock)
    {
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }
    public function getCode()
    {
        return $this->code;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getStock()
    {
        return $this->stock;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setCode($code)
    {
        $this->code = $code;
    }
    public function setStock($stock)
    {
        $this->stock = $stock;
    }
    public function isInstock()
    {
        return $this->stock > 0;
    }
    public function getInfo(){
        return "Code: {$this->code} - Name: {$this->name} - Price: {$this->price}VND - Stock: {$this->stock}";
    }

}
?>