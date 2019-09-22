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
    protected $title;
    protected $viewName;
    protected $model;
    protected $params;
    protected $messages;
    protected $layoutPage;
    protected $viewFile;


    public function __construct($controllerName, $title, $viewName, $model, $params, $messages, $layoutPage)
    {
        $this->controllerName = $controllerName;
        $this->title = $title;
        $this->viewName = $viewName;
        $this->model = $model;
        $this->params = $params;
        $this->messages = $messages;
        $this->layoutPage = $layoutPage;
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

        $this->viewFile = VIEWS_PATH . "{$directoryViewName}/{$this->viewName}";
        $layoutFile = VIEWS_PATH . "shared/{$this->layoutPage}";

        if (is_file($layoutFile))
        {
            if (is_file($this->viewFile))
            {
                ob_start();
                require_once($layoutFile);
                $template = ob_get_contents();
                ob_end_clean();
                return $template;
            }
            else
            {
                throw new Exception("View file [{$this->viewFile}] not found.", 1);
            }
        }
        else
        {
            throw new Exception("Layout template file [{$layoutFile}] not found.", 1);
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
