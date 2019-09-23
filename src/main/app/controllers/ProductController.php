<?php


namespace Dragonfly\App\Controllers;

use Dragonfly\App\Base\Controller;
use Dragonfly\app\managers\ProductManager;
use Dragonfly\App\Repositories\ProductRepository;

require_once (APP_PATH . BASE_PATH . 'Controller.php');
require_once (APP_PATH . MANAGERS_PATH . 'ProductManager.php');
require_once (APP_PATH . REPOSITORIES_PATH . 'ProductRepository.php');

/**
 * Class ProductController
 *
 * @package Dragonfly\App\Controllers
 */
class ProductController extends Controller
{

    private $productRepository;

    public function __construct()
    {
        parent::__construct(__CLASS__);
        $this->productRepository = new ProductRepository();
    }

    public function gallery($params=null)
    {
        switch($_SERVER['REQUEST_METHOD'])
        {
            case "GET":
                $productManager =  new ProductManager($this->productRepository);
                $products = $productManager->getGallery();

                parent::view("Product Collection", "gallery.php", $products);
                break;

            default:
                break;
        }
    }
}