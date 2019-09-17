<?php

namespace Dragonfly\App\Base;

use Exception;

class View
{
    protected $template;
    protected $controllerName;
    protected $viewName;
    protected $model;
    protected $params;



    public function __construct($controllerName, $viewName, $model, $params)
    {
        $this->controllerName = $controllerName;
        $this->viewName = $viewName;
        $this->model = $model;
        $this->params = $params;
        $this->render();
    }

    protected function render()
    {
        if (class_exists($this->controllerName))
        {
            $this->template = $this->getContentTemplate();
            echo $this->template;
        }
        else
        {
            throw new Exception("Controller [{$this->controllerName}] does not exist.", 1);
        }
    }

    protected function getContentTemplate()
    {
        //Implementing Convention over Configuration paradigm
        $directoryViewName = str_replace(CONTROLLERS_NAMESPACE, '', $this->controllerName);
        $directoryViewName = str_replace('Controller', '', $directoryViewName);

        $filePath = VIEWS_PATH . "{$directoryViewName}/{$this->viewName}";

        if (is_file($filePath))
        {
            //$model = $this->model;
            //$params = extract($this->params);
            ob_start();
            require_once($filePath);
            $template = ob_get_contents();
            ob_end_clean();
            return $template;
        }
        else
        {
            throw new Exception("View [{$filePath}] does not exist.", 1);
        }
    }
}

?>