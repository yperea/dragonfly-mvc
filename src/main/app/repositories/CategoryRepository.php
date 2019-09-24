<?php


namespace Dragonfly\App\Repositories;


use Dragonfly\App\Data\AppDbContext;
use Dragonfly\App\Repositories\Contracts\ICategoryRepository;


require_once (APP_PATH . DATA_PATH . 'AppDbContext.php');
//require_once (APP_PATH . MODELS_PATH . 'Product.php');
require_once (APP_PATH . CONTRACTS_PATH . 'ICategoryRepository.php');

class CategoryRepository implements ICategoryRepository
{
    protected $dbContext;

    public function __construct()
    {
        $this->dbContext = new AppDbContext("Category", "CATEGORIES", "class");
    }

    public function getCategories()
    {
        return $this->dbContext->getAll();
    }

    public function getCategoryById($id)
    {
        $results = null;
        $categories = $this->dbContext->getById($id);
        $results = (count($categories) == 1) ? $categories[0] : null;
        return $results;
    }
}