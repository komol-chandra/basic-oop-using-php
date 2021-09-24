<?php
class Car
{
    public static $numUser = 2;

    public static function setNum(int $int)
    {
        self::$numUser += $int;
    }

    public static function redirect($url)
    {
        header("Location: $url");
        exit;
    }
}
// echo Car::$numUser . PHP_EOL;

// Car::setNum(5);
// echo Car::$numUser . PHP_EOL;

Car::redirect("http://www.phpenthusiast.com");
