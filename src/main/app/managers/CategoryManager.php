<?php


namespace Dragonfly\App\Managers;


use Dragonfly\App\Repositories\Contracts\ICategoryRepository;

class CategoryManager
{
    protected $categoryRepository;

    public function __construct(ICategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategories()
    {
        return $this->categoryRepository->getCategories();
    }

    public function getCategory($id)
    {
        return $this->categoryRepository->getCategoryById($id);
    }

}