<?php
trait UserName
{
    public function name(string $string)
    {
        return "HI" . $string . PHP_EOL;
    }
}
/**
 *
 */
trait ClassName
{
    public function className()
    {
        return "Your Present Class Name is " . __CLASS__ . PHP_EOL;
    }
}

class Jam
{
    use ClassName, UserName;

    public function __construct()
    {
        $this->name("komol");
    }
}
trait MyTrait
{
    protected $defaultAddressLine = 'address';

    public function getAddressAttribute()
    {
        return $this->customAddressLine ?? $this->defaultAddressLine . PHP_EOL;
    }
    abstract public function getDefaultAddress();

}

class MyModel
{
    use MyTrait;
    protected $customAddressLine = 'address_custom';

    public function getDefaultAddress()
    {
        return $this->defaultAddressLine . PHP_EOL;
    }
}

$jam = new Jam();

echo $jam->name('komol');
echo $jam->className();

$myModel = new MyModel();
// echo $myModel->getAddressAttribute();
echo $myModel->getDefaultAddress();
