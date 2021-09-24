<?php
class Car
{
    public function calcNumMilesOnFullTank(array $models)
    {
        foreach ($models as $model) {
            echo "Name:" . $model[0] . ", Miles:" . $model[1] * $model[2] . PHP_EOL;
        }
    }
}

$car    = new Car();
$models = [
    ['Toyota', 12, 44],
    ['BMW', 13, 41],
];

$car->calcNumMilesOnFullTank($models);
