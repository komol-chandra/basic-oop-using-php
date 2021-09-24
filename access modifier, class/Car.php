<?php
class Car
{
    public $companyName;
    public $color = "black";
    public $wheel;

    public function mercedes()
    {
        $this->companyName = "Mercedes";
        $this->color       = "red";
        $this->wheel       = "black";
        print_r([
            $this->companyName,
            $this->color,
            $this->wheel,
        ]);
    }
}
$mercedesCar = new car();
echo $mercedesCar->color . PHP_EOL;
$mercedesCar->mercedes();
