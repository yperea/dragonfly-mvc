<?php
namespace Dragonfly\App\Base;

require_once (APP_PATH . BASE_PATH .'View.php');

/**
 * Class Controller
 *
 * @package Dragonfly\App\Base
 */
abstract class Controller
{
    protected $view;
    protected $controllerName;

    public function __construct($controllerName)
    {
        $this->controllerName = $controllerName;
    }

    /**
     * Gets the view object to be rendered.
     *
     * @param null $viewName
     * @param null $model
     * @param array $params
     * @param null $messages
     * @param null $layoutPage
     */
    protected function view($title = null, $viewName = null, $model = null, $params = array(), $messages = null, $layoutPage = null)
    {
        if(!isset($layoutPage))
        {
            $layoutPage = "layout.php";

        }

        $this->view = new View($this->controllerName, $title, $viewName, $model, $params, $messages, $layoutPage);
    }

    /**
     * Assigns the name of the controller.
     * Needed for older versions of PHP.
     *
     * @param $controllerName
     */
    protected function name ($controllerName)
    {
        $this->controllerName = $controllerName;
    }
}