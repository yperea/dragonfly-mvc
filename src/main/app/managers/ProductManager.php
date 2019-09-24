<?php


namespace Dragonfly\App\Managers;


use Dragonfly\App\Helpers\Messages\MessageFactory;
use Dragonfly\App\Repositories\Contracts\IProductRepository;


require_once (APP_PATH . HELPERS_PATH . "messages/MessageFactory.php");
require_once (APP_PATH . HELPERS_PATH . "utils.php");

class ProductManager
{
    protected $productRepository;
    protected $messages;

    /**
     * ProductManager constructor.
     * @param IProductRepository $productRepository
     */
    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->messages = array();
    }


    /**
     * @return mixed
     */
    public function getCollection()
    {
        return $this->productRepository->getProducts();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProduct($id)
    {
        return $this->productRepository->getProductById($id);
    }

    /**
     * @return mixed
     */
    public function getProductsList()
    {
        return $this->productRepository->getProducts();
    }

    /**
     * @param $productView
     * @return bool
     */
    public function saveProduct($productView)
    {
        $result = false;

        $product = $productView->getProduct();
        $oldImage = $product->getImage();
        $newImage = $productView->getImage();

        if (!empty($newImage['name'])
            && ($oldImage != $newImage['name'])) {

            if (uploadImage($newImage, $newImageName, PRD_UPLOAD_PATH))
            {
                @unlink( APP_PATH . 'public/content/' . PRD_UPLOAD_PATH . $oldImage);
                $product->setImage($newImageName);
            }
        }

        if(empty($product->getSKU()))
        {
            $this->messages[] = MessageFactory::createMessage("error",
                "Enter a valid SKU.");
            return false;
        }

        if(empty($product->getId()))
        {
            $product = $this->productRepository->createProduct($product);
        }
        else
        {
            $product = $this->productRepository->updateProduct($product);
        }


        if($product->getId() != 0){

            $this->messages[] = MessageFactory::createMessage("success",
                "Product successfully updated.");

            $result = true;
        }
        return $result;
    }
}