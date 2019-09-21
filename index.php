<?php
session_start();
include "auto-load.php";

use Dragonfly\App\Base\Router;

require_once(env('APP_PATH') . "src/main/config/global.php");
require_once(env('APP_PATH') . "src/main/app/base/Router.php");

$router             = new Router();
$controllerName     = $router->controller . "Controller";
$controllerFullName = \CONTROLLERS_NAMESPACE . $controllerName;
$actionName         = $router->action;
$params             = $router->params;


if (is_file(CONTROLLERS_PATH . "{$controllerName}.php"))
{
    require_once(CONTROLLERS_PATH . "{$controllerName}.php");
    $controller = new $controllerFullName($controllerName);
    $controller->$actionName($params);
}

