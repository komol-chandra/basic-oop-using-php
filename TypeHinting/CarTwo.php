<?php
abstract class CarTwo
{
    protected $model;
    protected $height;

    abstract public function calTankValue();
}

class BMW extends CarTwo
{

    protected $rib;

    public function __construct(string $model, int $rib, int $height)
    {
        $this->rib    = $rib;
        $this->model  = $model;
        $this->height = $height;
    }

    public function calTankValue()
    {
        return $this->rib * $this->rib * $this->height;
    }
}

class Marcheds extends CarTwo
{
    protected $radius;

    public function __construct(int $model, int $radius, int $height)
    {
        $this->model  = $model;
        $this->radius = $radius;
        $this->height = $height;
    }

    public function calTankValue()
    {
        return $this->radius * $this->radius * pi() * $this->height;
    }

}

function calTankPrice(CarTwo $carTwo, $pricePerGalen)
{
    echo $carTwo->calTankValue() * 0.4687 * $pricePerGalen . "$" . PHP_EOL;
}

$bmw = new BMW("12343", 2, 2);

calTankPrice($bmw, 200);
