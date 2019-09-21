<?php


namespace Dragonfly\App\Repositories;


use Dragonfly\App\Repositories\Contracts\IUserRepository;
use Dragonfly\App\Models\User;

require_once (APP_PATH . MODELS_PATH . 'User.php');
require_once (APP_PATH . CONTRACTS_PATH . 'IUserRepository.php');

/**
 * Class DUserRepository
 *
 *
 * @package Dragonfly\App\Repositories
 */
class DUserRepository implements IUserRepository
{
    private $users;

    public function __construct()
    {

        $this->users = array();
        $jsonContent = file_get_contents(__DIR__ . "/../../../resources/users.json");
        $usersArray = json_decode($jsonContent, true);

        foreach ($usersArray as $item)
        {
            $user = new User();
            $user->setId($item['Id']);
            $user->setEmail($item['Email']);
            $user->setUsername($item['Username']);
            $user->setPassword($item['Password']);

            $this->users[] = $user;
        }
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param $id
     * @return mixed|null
     */
    public function getUserById($id)
    {
        foreach ($this->users as $user)
        {
            if($user->getId() == $id){
                return $user;
            }
        }
        return null;
    }

    /**
     * @param $username
     * @return mixed|null
     */
    public function getUserByUsername($username)
    {
        foreach ($this->users as $user)
        {
            if($user->getUsername() == $username){
                return $user;
            }
        }
        return null;
    }

    /**
     * @param $email
     * @return mixed|null
     */
    public function getUserByEmail($email)
    {
        foreach ($this->users as $user)
        {
            if($user->getEmail() == $email){
                return $user;
            }
        }
        return null;
    }

    /**
     * @param $user
     * @return mixed
     */
    public function createUser($user)
    {
        $last = end($this->users[]);
        $user->setId($last->getId()+1);
        $this->users[] = $user;
        return $user;
    }
}