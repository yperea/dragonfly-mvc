<?php


namespace Dragonfly\App\ViewModels;


class SignUpViewModel
{
    private $Email;
    private $Username;
    private $Password;
    private $Password2;

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

    /**
     * @return mixed
     */
    public function getPassword2()
    {
        return $this->Password2;
    }

    /**
     * @param mixed $password2
     */
    public function setPassword2($password2)
    {
        $this->Password2 = $password2;
    }

}