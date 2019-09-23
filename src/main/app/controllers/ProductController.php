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
                $productManager =  new ProductManager($this->productRepository);
                $products = $productManager->getGallery();

                parent::view("Product Collection", "gallery.php", $products);
                break;
        }
    }

    public function details($params=null)
    {
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'GET':

                $productManager = new ProductManager($this->productRepository);
                $product = $productManager->getProduct($params['id']);

                parent::view("Product Details", "details.php",
                    $product, null, null,
                    "layout.php");
                break;

            /*
            case 'POST':
                $userCredentials = new Login();
                $userCredentials->setUsername($_POST['username']);
                $userCredentials->setPassword($_POST['password']);

                $userManager = new UserManager($this->userRepository);
                $result = $userManager->signIn($userCredentials);

                if($result)
                {
                    header("location:/". APP_HOST );
                }
                else
                {
                    parent::view("Login", "login.php",
                        $userCredentials, null, $userManager->getMessages(),
                        "layout-signin.php");
                }
                break;
            */
            default:
                break;
        }
    }

}