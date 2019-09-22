<?php


namespace Dragonfly\App\Repositories;

use Dragonfly\App\Data\AppDbContext;
use Dragonfly\App\Repositories\Contracts\IUserRepository;
use Dragonfly\App\Models\User;

require_once (APP_PATH . DATA_PATH . 'AppDbContext.php');
require_once (APP_PATH . MODELS_PATH . 'User.php');
require_once (APP_PATH . CONTRACTS_PATH . 'IUserRepository.php');

/**
 * Class UserRepository to persist User data.
 *
 *
 * @package Dragonfly\App\Repositories
 */
class UserRepository implements IUserRepository
{
    private $dbContext;
    private $user;

    public function __construct()
    {
        $this->dbContext = new AppDbContext("User", "USERS", "class");
        $this->user = new User();
    }

    /**
     * @return array|null
     */
    public function getUsers ()
    {
        return $this->dbContext->getAll();
    }

    /**
     * @param $id
     * @return array|null
     */
    public function getUserById ($id)
    {
        return $this->dbContext->getById($id);
    }

    /**
     * @param $username
     * @return array|null
     */
    public function getUserByUsername ($username)
    {
        $params = ["username"=> $username];
        return $this->dbContext->getByParams($params);
    }

    /**
     * @param $email
     * @return array|null
     */
    public function getUserByEmail ($email)
    {
        $params = ["Email" => $email];
        return $this->dbContext->getByParams($params);

    }

    /**
     * @param $user
     * @return array|null
     */
    public function createUser($user)
    {
        $entityMap = array();

        foreach ($user->toArray() as $key => $value)
        {
            if($value != null){
                $entityMap["$key"] = "$value";
            }
        }
        $id = $this->dbContext->insert($entityMap);
        return self::getUserById($id);
    }

    public function __get($name)
    {
        switch ($name)
        {
            case "users":
                return $this->dbContext->getAll();
                break;
        }
    }

}