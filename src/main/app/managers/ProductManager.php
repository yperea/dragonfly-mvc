<?php


namespace Dragonfly\app\managers;


use Dragonfly\App\Repositories\Contracts\IProductRepository;

class ProductManager
{
    protected $productRepository;
    protected $messages;

    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->messages = array();
    }


    public function getGallery()
    {
        return $this->productRepository->getProducts();
    }
}