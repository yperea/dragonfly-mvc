<?php
namespace Dragonfly\App\Models;


/**
 * Class User
 *
 * @package Dragonfly\App\Models
 */
class User
{
    protected $Id;
    protected $Username;
    protected $Email;
    protected $Password;
    protected $Created;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->Id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->Username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->Username = $username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->Email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->Password = $password;
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
                        "Email" => self::getEmail(),
                        "Username" => self::getUsername(),
                        "Password" => self::getPassword(),
                    ];
        return $objArray;
    }

}
