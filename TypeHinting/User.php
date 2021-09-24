<?php

interface User
{
    public function setUserName(string $userName);

    public function getUserName();

    public function setGender(string $gender);

    public function getGender();
}

class Commentator implements User
{

    private $gender;
    private $userName;

    public function setUserName(string $userName)
    {
        $this->userName = $userName;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setGender(string $gender)
    {
        $gendersArray = ['female', 'male', 'other'];
        if (in_array($gender, $gendersArray)) {
            $this->gender = $gender;
        }
    }

    public function getGender()
    {
        return $this->gender;
    }
}

$user = new Commentator();
$user->setUserName("Komol");
$user->setGender("male");

function setMrOrMrsToUserName(User $user)
{
    $userName   = $user->getUserName();
    $userGender = $user->getGender();
    if ($userGender === "male") {
        echo "Mr " . $userName;
    } else if ($userGender === "female") {
        echo "Mrs" . $userName;
    } else {
        echo $userName;
    }
}
setMrOrMrsToUserName($user);
