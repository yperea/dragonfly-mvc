<?php


namespace Dragonfly\App\Repositories;


use Dragonfly\App\Data\AppDbContext;
use Dragonfly\App\Models\Category;
use Dragonfly\App\Models\Product;
use Dragonfly\App\Repositories\Contracts\IProductRepository;

require_once (APP_PATH . DATA_PATH . 'AppDbContext.php');
require_once (APP_PATH . MODELS_PATH . 'Product.php');
require_once (APP_PATH . CONTRACTS_PATH . 'IProductRepository.php');

require_once (APP_PATH . REPOSITORIES_PATH . 'CategoryRepository.php');
/**
 * Class ProductRepository to persist Product data.
 *
 *
 * @package Dragonfly\App\Repositories
 */
class ProductRepository implements IProductRepository
{

    private $dbContext;
    private $product;

    public function __construct()
    {
        $this->dbContext = new AppDbContext("Product", "PRODUCTS", "class");
        $this->product = new Product();
    }


    /**
     * @return array|null
     */
    public function getProducts()
    {
        $productsArray = $this->dbContext->getAll();

        foreach ($productsArray as $product){
            $categoryRepository = new CategoryRepository();
            $category = $categoryRepository->getCategoryById($product->getCategoryId());
            $product->setCategory($category);
        }

        return $productsArray;
    }


    /**
     * @param $id
     * @return array|null
     */
    public function getProductById ($id)
    {
        $results = null;
        $products = $this->dbContext->getById($id);
        $results = (count($products) == 1) ? $products[0] : null;

        if ($results != null)
        {
            $categoryRepository = new CategoryRepository();
            $category = $categoryRepository->getCategoryById($results->getCategoryId());
            $results->setCategory($category);
        }

        return $results;
    }

    /**
     * @param $product
     * @return array|null
     */
    public function updateProduct($product)
    {
        $entityMap = array();

        foreach ($product->toArray() as $key => $value)
        {
            if($value != null && !is_object($value)){
                $entityMap["$key"] = "$value";
            }
        }
        $id = $this->dbContext->update($entityMap);
        return self::getProductById($id);
    }

    /**
     * @param $product
     * @return array|null
     */
    public function createProduct($product)
    {
        $entityMap = array();

        foreach ($product->toArray() as $key => $value)
        {
            if($value != null){
                $entityMap["$key"] = "$value";
            }
        }
        $id = $this->dbContext->insert($entityMap);
        return self::getProductById($id);
    }

}