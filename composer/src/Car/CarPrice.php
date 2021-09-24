<?php
namespace App\Car;

class CarPrice
{
    public $price;

    public function setPrice(int $int)
    {
        $this->price = $int;
    }

    public function getPrice()
    {
        return $this->price;
    }

}
