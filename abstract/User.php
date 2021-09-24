<?php
abstract class User
{
    protected $username;

    public function setName($name)
    {
        $this->username = $name;
    }

    public function getName()
    {
        return $this->username . PHP_EOL;
    }
    abstract public function stateYourRole();
}

class Admin extends User
{
    public function stateYourRole()
    {
        echo strtolower(__CLASS__) . PHP_EOL;
    }
}

class Viewer extends User
{
    public function stateYourRole()
    {
        echo strtolower(__CLASS__) . PHP_EOL;
    }
}

$admin = new Admin();
$admin->getName('Balthazar');
// $admin->setName('')
$admin->stateYourRole();

$viewer = new Viewer();
// $admin->setName('')
$viewer->stateYourRole();
