<?php


namespace Dragonfly\App\Repositories\Contracts;


interface IProductRepository
{
    public function getProducts();
    public function getProductById($id);
}