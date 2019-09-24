<?php

namespace Dragonfly\App\ViewModels;


class LoginViewModel
{
    private $Username;
    private $Password;

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

}