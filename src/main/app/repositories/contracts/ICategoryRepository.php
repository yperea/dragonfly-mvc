<?php


namespace Dragonfly\App\Repositories\Contracts;


interface ICategoryRepository
{
    public function getCategories();
    public function getCategoryById($id);
}