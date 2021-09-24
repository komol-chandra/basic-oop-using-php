<?php
class AccessModifier
{
    private $model;

    public function __construct($model = null)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        echo "The " . __CLASS__ . " model is " . $this->model . "Line number is" . __LINE__ . "and File name is" . __FILE__ . "method name is" . __METHOD__;
    }

    public function setMOdel($modelName)
    {
        $this->model = $modelName;
    }
}
$model = new AccessModifier("KOKO");
// $model->setMOdel("koko");
$model->getModel();
