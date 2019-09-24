<?php


namespace Dragonfly\App\Models;


class Category
{
    protected $Id;
    protected $Name;
    protected $Description;
    protected $Image;
    protected $ParentId;
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
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->Name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->Description = $description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->Image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->Image = $image;
    }

    /**
     * @return mixed
     */
    public function getParentId()
    {
        return $this->ParentId;
    }

    /**
     * @param mixed $parentId
     */
    public function setParentId($parentId)
    {
        $this->ParentId = $parentId;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->Created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->Created = $created;
    }

}