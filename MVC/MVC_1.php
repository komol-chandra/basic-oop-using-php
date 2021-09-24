<?php
class Model
{
    // Store the data
    private $carPrice;
    // Set the data
    public function setPrice(int $price)
    {
        $this->carPrice = $price;
    }
    // Get the data
    public function getPrice()
    {
        return $this->carPrice;
    }
}
class Controller
{
    private $model;
    private $limit = 3000;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Set the data in the module
    public function setPrice(int $price)
    {
        $this->model->setPrice($price);
    }

    public function expensiveOrNot()
    {
        if ($this->model->getPrice() > $this->limit) {
            return "expensive";
        }
        return "Not Expensive";
    }

}

class View
{
    private $controller;
    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }
    public function output()
    {
        return $this->controller->expensiveOrNot();
    }
}
// The data can come from the database
$priceToCheck = 31000;
$model        = new Model();
$model->setPrice($priceToCheck);
//
$controller = new Controller($model);
//
$view = new View($controller);

echo $view->output() . PHP_EOL;

$priceToCheck2 = $_POST['price'] = 29900;

$model2      = new Model();
$controller2 = new Controller($model2);
$controller2->setPrice($priceToCheck2);
$view2 = new View($controller2);
echo $view2->output() . PHP_EOL;
