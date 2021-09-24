<?php
class UserRegisterMail
{
    public $firstName;
    public $lastName;

    public function hello()
    {
        return "hello, " . $this->firstName;
    }

    public function register()
    {
        echo $this->firstName . "" . $this->lastName . " registered" . PHP_EOL;
        return $this;
    }

    public function mail()
    {
        echo "Emailed" . PHP_EOL;
        return $this;
    }
}
$userModel            = new UserRegisterMail();
$userModel->firstName = "Jane";
$userModel->lastName  = "Reo";
$userHello            = $userModel->register()->mail();

// print_r($userHello);
