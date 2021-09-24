<?php
abstract class Car
{
    // Abstract classes can have properties
    protected $tankVolume;
    // Abstract classes can have non abstract methods
    public function setTankVolume($volume)
    {
        $this->tankVolume = $volume;
    }
    //abstract method
    abstract public function calcNumMilesOnFullTank();
}

class Honda extends Car
{
    public function calcNumMilesOnFullTank()
    {
        $miles = $this->tankVolume * 30;
        echo $miles . PHP_EOL;
    }

    public function getColor()
    {
        echo "beige";
    }
}

$car1 = new Honda();

$car1->setTankVolume(10);

$car1->calcNumMilesOnFullTank();
$car1->getColor();
