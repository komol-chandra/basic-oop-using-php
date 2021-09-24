<?php
class Car
{
    private $model = "komol";

    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }
    public function hello()
    {
        echo "beep! I am a <i>" . $this->model . "</i><br />";
        return $this;
    }

    final public function hi()
    {
        echo "hi";
    }
}

class SportCar extends Car
{
    public function hi()
    {
        echo "hi komol";
    }
}

$sportCar1 = new SportCar();
$sportCar1->hi();
// $sportCar1->setModel('Sport Car')->hello();
