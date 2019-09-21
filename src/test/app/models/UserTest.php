<?php
namespace Dragonfly\App\Models;

require_once (__DIR__. "/../../../test/config/global.php");
require_once (__DIR__. MODELS_PATH . "User.php");

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    /**
     * @dataProvider usersData
     *
     * @param $inputUser
     * @param $expected
     */
    public function testUserData($inputUser, $expected)
    {
        $user = new User();
        $user->setId($inputUser['Id']);
        $user->setEmail($inputUser['Email']);
        $user->setUsername($inputUser['Username']);
        $user->setPassword($inputUser['Password']);

        //$this->assertEquals($expected, $user->getUsername());
        $this->assertEquals($expected, $user);
    }


    /**
     * @dataProvider usernameData
     */
    public function testUser_Username($inputUser, $expected)
    {
        $user = new User();
        $user->setUsername($inputUser['Username']);

        $this->assertEquals($expected, $user->getUsername());
    }

    public function usersData()
    {

        $user1 = new User();
        $user1->setId(1);
        $user1->setEmail('yperea@msn.com');
        $user1->setUsername('yperea');
        $user1->setPassword('$2y$10$aRHs4qxGmHaq6JVkY3eqbuxKjOPj/XLuvmGa9Bi8wm33.UMX4hbfy');

        $user2 = new User();
        $user2->setId(2);
        $user2->setEmail('clacar@msn.com');
        $user2->setUsername('clacar');
        $user2->setPassword('$2y$10$aRHs4qxGmHaq6JVkY3eqbuxKjOPj/XLuvmGa9Bi8wm33.UMX4hbfy');

        $data = [];
        $data[] = [$this->getJsonUsersArray()[0], $user1];
        $data[] = [$this->getJsonUsersArray()[1], $user2];
        return $data;
    }

    public function usernameData()
    {

        $user1 = new User();
        $user1->setId(1);
        $user1->setEmail('yperea@msn.com');
        $user1->setUsername('yperea');
        $user1->setPassword('$2y$10$aRHs4qxGmHaq6JVkY3eqbuxKjOPj/XLuvmGa9Bi8wm33.UMX4hbfy');

        $user2 = new User();
        $user2->setId(2);
        $user2->setEmail('clacar@msn.com');
        $user2->setUsername('clacar');
        $user2->setPassword('$2y$10$aRHs4qxGmHaq6JVkY3eqbuxKjOPj/XLuvmGa9Bi8wm33.UMX4hbfy');

        $data = [];
        $data[] = [$this->getJsonUsersArray()[0], 'yperea'];
        $data[] = [$this->getJsonUsersArray()[1], 'clacar'];
        return $data;
    }

    private function getJsonUsersArray()
    {
        $users = file_get_contents(__DIR__ . "/../../resources/users.json");
        return json_decode($users, true);
    }
}