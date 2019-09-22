<?php


namespace Dragonfly\App\Repositories;


use Dragonfly\App\Data\AppDbContext;
use Dragonfly\App\Models\Product;
use Dragonfly\App\Repositories\Contracts\IProductRepository;

require_once (APP_PATH . DATA_PATH . 'AppDbContext.php');
require_once (APP_PATH . MODELS_PATH . 'Product.php');
require_once (APP_PATH . CONTRACTS_PATH . 'IProductRepository.php');


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
        return $this->dbContext->getAll();
    }

    /**
     * @param $id
     * @return array|null
     */
    public function getProductById($id)
    {
        return $this->dbContext->getById($id);
    }
}