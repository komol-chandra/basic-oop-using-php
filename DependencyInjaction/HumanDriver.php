<?php
interface Driver
{
    public function sayYourName(string $name);
}
class HumanDriver implements Driver
{
    // Method to return the driver name.
    public function sayYourName(string $name)
    {
        return $name;
    }
}

class RobotDriver implements Driver
{
    public function sayYourName(string $name)
    {
        return $name;
    }
}

class Car
{
    protected $driver;

    public function __construct(Driver $driver)
    {
        $this->driver = $driver;
    }

    public function getDriver()
    {
        return $this->driver;
    }
}
$robotDriver = new RobotDriver();
$car         = new Car($robotDriver);

echo $car->getDriver()->sayYourName("A2-A1");
