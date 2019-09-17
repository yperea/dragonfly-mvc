<?php
namespace Dragonfly\App\Base;

require_once (APP_PATH . BASE_PATH .'View.php');

abstract class Controller
{
    protected $view;
    protected $controllerName;

    protected function view($viewName = null, $model = null, $params = array())
    {
        $this->view = new View($this->controllerName, $viewName, $model, $params);
    }

    protected function name ($controllerName)
    {
        $this->controllerName = $controllerName;
    }
}
?>