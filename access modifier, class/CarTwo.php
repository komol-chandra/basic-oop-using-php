<?php

/*
in this program we go na do
we check car milage using $gallons = (miles/oil)
then check how much oil are left now after 10 or some km ride.

problem
For instance, in our Car class, let’s say that we want to measure how much fuel we have in our car’stank. The amount of fuel in the tank is dependent upon the number of miles we have driven in our car, as well as the amount of fuel that we put in the tank.

solve
1. The fill() method adds gallons of fuel to our car’s tank.
2. The ride() method calculates how much fuel we consume when we ride a certain distance,
and then subtracts it from the tank. In our example, we assume that the car consumes 1 gallon
of fuel every 50 miles.
 */
class CarTwo
{
    public $tank;

// Add gallons of fuel to the tank when we fill it
    public function fill($float)
    {
        $this->tank += $float;
        return $this;
    }

// Subtract gallons of fuel from the tank as we ride the car
    public function ride($float)
    {
        $miles   = $float;
        $gallons = $miles / 50;
        $this->tank -= $gallons;
        return $this;
    }
}

$carModel = new CarTwo();
$tank     = $carModel->fill(10)->ride(40)->tank;

echo "The number of gallons left in the tank: " . $tank . " gal.";

// print_r($carModel);
