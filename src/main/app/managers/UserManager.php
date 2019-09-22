<?php


namespace Dragonfly\App\Managers;

use Dragonfly\App\Helpers\Messages\MessageFactory;

use Dragonfly\App\Models;
use Dragonfly\App\Repositories\Contracts\IUserRepository;

require_once (APP_PATH . MODELS_PATH . "User.php");
require_once (APP_PATH . HELPERS_PATH . "messages/MessageFactory.php");


/**
 * Class UserManager
 * Handles operations with user accounts.
 *
 * @package Dragonfly\App\Managers
 */
class UserManager
{
    private $user;
    private $userRepository;
    private $messages;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->messages = array();
    }

    /**
     * Creates a new user account.
     *
     * @param $newUser
     * @return bool
     */
    public function signUp($newUser)
    {
        $result = false;
        $email = $newUser->getEmail();
        $username = $newUser->getUsername();
        $password = $newUser->getPassword();
        $password2 = $newUser->getPassword2();

        if(empty($email))
        {
            $this->messages[] = MessageFactory::createMessage("error",
                "Enter a valid Email.");
            return false;
        }

        if(empty($username))
        {
            $this->messages[] = MessageFactory::createMessage("error",
                "Enter a valid Username.");
            return false;
        }

        if($password == $password2)
        {
            $user = $this->userRepository->getUserByEmail($email);
            if($user == null)
            {
                $user = $this->userRepository->getUserByUsername($username);
                if($user == null)
                {


                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    $user = new Models\User();
                    $user->setUsername($username);
                    $user->setEmail($email);
                    $user->setPassword($hashedPassword);

                    $user = $this->userRepository->createUser($user);

                    if($user->getId() != 0){
                        $result = true;
                    }

                }
                else
                {
                    $this->messages[] = MessageFactory::createMessage("error",
                                    "The username is already taken.");
                }
            }
            else
            {
                $this->messages[] = MessageFactory::createMessage("error",
                    "The email is already taken.");
            }
        }
        else
        {
            $this->messages[] = MessageFactory::createMessage("error",
                "The password and its confirmation must be equals.");
        }
        return $result;
    }

    /**
     * Validates and creates a new session for the authenticated user.
     *
     * @param $userCredentials
     * @return bool
     */
    public function signIn($userCredentials)
    {
        $result = false;
        $username = $userCredentials->getUsername();
        $password = $userCredentials->getPassword();

        if(empty($username))
        {
            $this->messages[] = MessageFactory::createMessage("error",
                "Enter a valid Username.");
            return false;
        }

        if(empty($password))
        {
            $this->messages[] = MessageFactory::createMessage("error",
                "Enter a valid Password.");
            return false;
        }

        $userAccount = $this->userRepository->getUserByUsername($username);

        if (isset($userAccount))
        {
            $hashedPassword = $userAccount->getPassword();
            if(password_verify($password, $hashedPassword))
            {
                self::syncSession($userAccount->getId(), $userAccount->getUsername());
                $result = true;
            }
            else
            {
                $this->messages[] = MessageFactory::createMessage("error",
                    "Invalid username or password.");
            }
        }
        else
        {
            $this->messages[] = MessageFactory::createMessage("error",
                "Invalid username or password.");
        }

        return $result;
    }

    /**
     * Updates session variables with the most recent information of the user.
     *
     * @param null $userId
     * @param null $username
     */
    public function syncSession($userId = null, $username = null)
    {
        $_SESSION['userId']     = $userId;
        $_SESSION['username']   = $username;
    }

    /**
     * Closes the session variables.
     */
    public function closeSession()
    {
        if (isset($_SESSION['userId']))
        {
            // Delete the session vars by clearing the $_SESSION array
            $_SESSION = array();
            // Destroy the session
            session_destroy();
        }
    }

    /**
     * Return messages obtained within class operations.
     *
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }
}