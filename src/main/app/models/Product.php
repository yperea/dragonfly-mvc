<?php


namespace Dragonfly\App\Models;


/**
 * Class Product
 *
 * @package Dragonfly\App\Models
 */
class Product
{
    protected $Id;
    protected $SKU;
    protected $Title;
    protected $ShortDescription;
    protected $LongDescription;
    protected $Cost;
    protected $Price;
    protected $Quantity;
    protected $Image;
    protected $Weight;
    protected $Height;
    protected $Depth;
    protected $Created;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param mixed $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @return mixed
     */
    public function getSKU()
    {
        return $this->SKU;
    }

    /**
     * @param mixed $SKU
     */
    public function setSKU($SKU)
    {
        $this->SKU = $SKU;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * @param mixed $Title
     */
    public function setTitle($Title)
    {
        $this->Title = $Title;
    }

    /**
     * @return mixed
     */
    public function getShortDescription()
    {
        return $this->ShortDescription;
    }

    /**
     * @param mixed $ShortDescription
     */
    public function setShortDescription($ShortDescription)
    {
        $this->ShortDescription = $ShortDescription;
    }

    /**
     * @return mixed
     */
    public function getLongDescription()
    {
        return $this->LongDescription;
    }

    /**
     * @param mixed $LongDescription
     */
    public function setLongDescription($LongDescription)
    {
        $this->LongDescription = $LongDescription;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->Cost;
    }

    /**
     * @param mixed $Cost
     */
    public function setCost($Cost)
    {
        $this->Cost = $Cost;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->Price;
    }

    /**
     * @param mixed $Price
     */
    public function setPrice($Price)
    {
        $this->Price = $Price;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->Quantity;
    }

    /**
     * @param mixed $Quantity
     */
    public function setQuantity($Quantity)
    {
        $this->Quantity = $Quantity;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->Image;
    }

    /**
     * @param mixed $Image
     */
    public function setImage($Image)
    {
        $this->Image = $Image;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->Weight;
    }

    /**
     * @param mixed $Weight
     */
    public function setWeight($Weight)
    {
        $this->Weight = $Weight;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->Height;
    }

    /**
     * @param mixed $Height
     */
    public function setHeight($Height)
    {
        $this->Height = $Height;
    }

    /**
     * @return mixed
     */
    public function getDepth()
    {
        return $this->Depth;
    }

    /**
     * @param mixed $Depth
     */
    public function setDepth($Depth)
    {
        $this->Depth = $Depth;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->Created;
    }

    /**
     * @param mixed $Created
     */
    public function setCreated($Created)
    {
        $this->Created = $Created;
    }

    /**
     * Return an array with object information so it can be used
     * by Db Context to generate automatic statements.
     *
     * @return array
     */
    public function toArray()
    {
        $objArray = [
            "Id" => self::getId(),
            "SKU"=> self::getSKU(),
            "Title"=> self::getTitle(),
            "ShortDescription"=> self::getShortDescription(),
            "LongDescription"=> self::getLongDescription(),
            "Cost"=> self::getCost(),
            "Price"=> self::getPrice(),
            "Quantity"=> self::getQuantity(),
            "Image"=> self::getImage(),
            "Weight"=> self::getWeight(),
            "Height"=> self::getHeight(),
            "Depth"=> self::getDepth()
        ];
        return $objArray;
    }
}