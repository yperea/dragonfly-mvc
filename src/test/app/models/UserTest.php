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
     * @dataProvider usersData
     */
    public function testUser_Username($inputUser, $expected)
    {
        $user = new User();
        $user->setUsername($inputUser->Username);

        $this->assertEquals($expected, $user->getUsername());
        //$this->assertEquals($expected, $user);
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

    private function getJsonUsersArray()
    {
        $user = '[
                    {
                        "Id":"1", 
                        "Username":"yperea",
                        "Email":"yperea@msn.com",
                        "Password":"$2y$10$aRHs4qxGmHaq6JVkY3eqbuxKjOPj/XLuvmGa9Bi8wm33.UMX4hbfy",
                        "Created":""
                    },
                    {
                        "Id":"2", 
                        "Username":"clacar",
                        "Email":"clacar@msn.com",
                        "Password":"$2y$10$aRHs4qxGmHaq6JVkY3eqbuxKjOPj/XLuvmGa9Bi8wm33.UMX4hbfy",
                        "Created":""
                    }
                 ]';

        $objUser = json_decode($user, true);
        return $objUser;
    }
}