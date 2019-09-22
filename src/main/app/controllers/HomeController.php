<?php

namespace Dragonfly\App\Controllers;

use Dragonfly\App\Base\Controller;

require_once (APP_PATH . BASE_PATH . 'Controller.php');

/**
 * Class HomeController
 *
 * @package Dragonfly\App\Controllers
 */
class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct(__CLASS__);
    }

    public function index($params = null)
    {
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'GET':
                parent::view("Home", "index.php",
                    null, null, null,
                    "layout-landing.php");
                break;

            default:
                break;
        }
    }
}