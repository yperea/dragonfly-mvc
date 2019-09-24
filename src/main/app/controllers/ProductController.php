<?php


namespace Dragonfly\App\Controllers;

use Dragonfly\App\Base\Controller;
use Dragonfly\App\Managers\CategoryManager;
use Dragonfly\app\managers\ProductManager;
use Dragonfly\App\Repositories\CategoryRepository;
use Dragonfly\App\Repositories\ProductRepository;
use Dragonfly\App\Viewmodels\ProductViewModel;
use Dragonfly\App\Models\Product;

require_once (APP_PATH . BASE_PATH . 'Controller.php');
require_once (APP_PATH . MANAGERS_PATH . 'ProductManager.php');
require_once (APP_PATH . MANAGERS_PATH . 'CategoryManager.php');
require_once (APP_PATH . REPOSITORIES_PATH . 'ProductRepository.php');
require_once (APP_PATH . REPOSITORIES_PATH . 'CategoryRepository.php');
require_once (APP_PATH . VIEWMODELS_PATH . 'ProductViewModel.php');
require_once (APP_PATH . MODELS_PATH . 'Product.php');

/**
 * Class ProductController
 *
 * @package Dragonfly\App\Controllers
 */
class ProductController extends Controller
{

    private $productRepository;
    private $categoryRepository;

    public function __construct()
    {
        parent::__construct(__CLASS__);
        $this->productRepository = new ProductRepository();
        $this->categoryRepository = new CategoryRepository();
    }

    /**
     * @param null $params
     */
    public function collection($params=null)
    {
        switch($_SERVER['REQUEST_METHOD'])
        {
            case "GET":
                $productManager =  new ProductManager($this->productRepository);
                $products = $productManager->getCollection();

                parent::view("Latest Collection", "collection.php", $products);
                break;

            default:
                header("location:/". APP_HOST );
                break;
        }
    }

    /**
     * @param null $params
     */
    public function list($params=null)
    {
        switch($_SERVER['REQUEST_METHOD'])
        {
            case "GET":
                $productManager =  new ProductManager($this->productRepository);
                $products = $productManager->getProductsList();

                parent::view("Products List", "list.php", $products);
                break;
        }
    }

    /**
     * @param null $params
     */
    public function edit($params=null)
    {
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'GET':

                $productManager = new ProductManager($this->productRepository);
                $product = $productManager->getProduct($params['id']);

                $categoryManager = new CategoryManager($this->categoryRepository);
                $categories = $categoryManager->getCategories();

                $productView = new ProductViewModel();
                $productView->setProduct($product);
                $productView->setCategories($categories);

                parent::view("Edit Product", "edit.php",
                    $productView, null, null,
                    "layout.php");
                break;


            case 'POST':
                $productView = self::setProductView();
                $productManager = new ProductManager($this->productRepository);
                $result = $productManager->saveProduct($productView);

                if($result)
                {
                    header("location:/". APP_HOST . "product/list");
                }
                else
                {
                    $categoryManager = new CategoryManager($this->categoryRepository);
                    $categories = $categoryManager->getCategories();
                    $productView->setCategories($categories);

                    parent::view("Edit Product", "edit.php",
                        $productView, null, $productManager->getMessages(),
                        "layout.php");
                }
                break;

            default:
                break;
        }
    }

    /**
     * @param null $params
     */
    public function new($params=null)
    {
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'GET':

                $product = new Product();
                $categoryManager = new CategoryManager($this->categoryRepository);
                $categories = $categoryManager->getCategories();

                $productView = new ProductViewModel();
                $productView->setProduct($product);
                $productView->setCategories($categories);

                parent::view("New Product", "new.php",
                    $productView, null, null,
                    "layout.php");
                break;


            case 'POST':
                $productView = self::setProductView();
                $productManager = new ProductManager($this->productRepository);
                $result = $productManager->saveProduct($productView);

                if($result)
                {
                    header("location:/". APP_HOST . "product/list");
                }
                else
                {
                    $categoryManager = new CategoryManager($this->categoryRepository);
                    $categories = $categoryManager->getCategories();
                    $productView->setCategories($categories);

                    parent::view("New Product", "new.php",
                        $productView, null, $productManager->getMessages(),
                        "layout.php");
                }
                break;

            default:
                break;
        }
    }

    /**
     * @param null $params
     */
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

            default:
                break;
        }
    }

    /**
     * @return ProductViewModel
     */
    private function setProductView(){
        $product = new Product();
        $productView = new ProductViewModel();

        $product->setId($_POST['productId']);
        $product->setSKU($_POST['productSKU']);
        $product->setTitle($_POST['productTitle']);
        $product->setShortDescription($_POST['productShortDescription']);
        $product->setLongDescription($_POST['productLongDescription']);
        $product->setCost($_POST['productCost']);
        $product->setPrice($_POST['productPrice']);
        $product->setQuantity($_POST['productQuantity']);
        $product->setCategoryId($_POST['productCategory']);
        $product->setImage($_POST['currentProductImage']);
        $newProductImage    = $_FILES['newProductImage'];

        $categoryManager = new CategoryManager($this->categoryRepository);
        $category = $categoryManager->getCategory($product->getCategoryId());
        $product->setCategory($category);

        $productView->setProduct($product);
        $productView->setImage($newProductImage);

        return $productView;
    }

}