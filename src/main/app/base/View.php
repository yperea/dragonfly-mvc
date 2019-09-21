<?php

namespace Dragonfly\App\Base;

use Exception;

/**
 * Class View to render the web page to be displayed.
 *
 * @package Dragonfly\App\Base
 */
class View
{
    protected $template;
    protected $controllerName;
    protected $viewName;
    protected $model;
    protected $params;
    protected $messages;


    public function __construct($controllerName, $viewName, $model, $params, $messages)
    {
        $this->controllerName = $controllerName;
        $this->viewName = $viewName;
        $this->model = $model;
        $this->params = $params;
        $this->messages = $messages;
        $this->render();
    }

    /**
     * Renders the web page
     *
     * @throws Exception
     */
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

    /**
     * Gets the HTML to be rendered.
     *
     * @return false|string
     * @throws Exception
     */
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

    /**
     * Loads messages obtained from Manager Classes.
     *
     * @return Message object | null
     */
    protected function displayMessages ()
    {
        if(!isset($this->messages)){
            return null;
        }
        foreach ($this->messages as $message)
        {
            return $message->display();
        }
    }
}
