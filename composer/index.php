<?php
// 1. Require the namespaced file
// require "src/Car/CarIntro.php";
// require "src/Car/CarPrice.php";
// require_once __DIR__ . '/vendor/autoload.php';
require "vendor/autoload.php";
// 2. Import the namespaced
use App\Car\CarIntro;
use App\Car\CarPrice;

$car = new CarIntro();
echo $car->sayHello();

$carPrice = new CarPrice();
$carPrice->setPrice(500);
echo $carPrice->getPrice() . PHP_EOL;

// Use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();
// Generate fake name
echo $faker->name . PHP_EOL;
// Generate fake address
echo $faker->address . PHP_EOL;
// Generate fake text
echo $faker->text . PHP_EOL;
