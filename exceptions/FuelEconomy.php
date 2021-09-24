<?php
class FuelEconomy
{
    // Calculate the fuel efficiency
    public function calculate($distance, $gas)
    {
        if ($gas <= 0) {
            throw new Exception("the gas value is 0 or lass then 0");
        }
        return $distance / $gas;
    }
}
$dataFromCars = [
    [50, 10],
    [50, 0],
    [50, -3],
    [30, 5],
];

foreach ($dataFromCars as $data => $value) {
    try {
        $fuelEconomy = new FuelEconomy();
        echo $fuelEconomy->calculate($value[0], $value[1]) . PHP_EOL;
    } catch (Exception $e) {
        echo $data . " Message: " . $e->getMessage() . PHP_EOL;
        echo $data . " FileName: " . $e->getFile() . PHP_EOL;
        echo $data . " FileLine: " . $e->getLine() . PHP_EOL;

        // save error in logfile
        error_log($e->getMessage());
        error_log($e->getFile());
        error_log($e->getLine());
    }

}
