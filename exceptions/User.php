<?php
class User
{
    private $name;
    private $age;

    public function setName(string $name)
    {
        $name = trim($name);
        if (strlen($name) <= 3) {
            throw new Exception('The name field need upto 3 letter');
        }
        $this->name = $name;
    }
    public function setAge($age)
    {
        if ($age <= 0) {
            throw new Exception('the age can not be 0 or less then 0 or string');
        }
        $this->age = $age;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getAge()
    {
        return $this->age;
    }
}

$dataForUsers = [
    ["Bent", 4],
    ["Eva", 28],
    ["li", 29],
    ["li", -1],
    ["Catie", "not yet born"],
    ["Sue", 1.5],
];

foreach ($dataForUsers as $key => $value) {
    try {
        $user = new User();
        $user->setName($value[0]);
        $user->setAge($value[1]);
        echo "#" . $key . "=>" . " the user name is " . $user->getName() . " & age is " . $user->getAge() . PHP_EOL;
    } catch (Exception $e) {
        echo "#" . $key . "=>" . "Message: " . $e->getMessage() . PHP_EOL;
    }
}
