<?php

namespace Dragonfly\App\Controllers;

use Dragonfly\App\Base\Controller;
use Dragonfly\App\Repositories\DUserRepository;
use Dragonfly\App\Repositories\UserRepository;
use Dragonfly\App\Managers\UserManager;
use Dragonfly\App\ViewModels\Login;
use Dragonfly\App\ViewModels\UserAccount;

require_once (APP_PATH . BASE_PATH . 'Controller.php');
require_once (APP_PATH . REPOSITORIES_PATH . 'UserRepository.php');
//require_once (APP_PATH . REPOSITORIES_PATH . 'dummies/DUserRepository.php');
require_once (APP_PATH . VIEWMODELS_PATH . 'Login.php');
require_once (APP_PATH . VIEWMODELS_PATH . 'UserAccount.php');
require_once (APP_PATH . MANAGERS_PATH . 'UserManager.php');

/**
 * Class AccountController
 *
 * @package Dragonfly\App\Controllers
 */
class AccountController extends Controller
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct(__CLASS__);
        $this->userRepository = new UserRepository();
        //$this->userRepository = new DUserRepository();
    }

    /**
     * Perform signin process.
     *
     * @param null $userCredentials
     * @param null $returnUrl
     */
    public function login()
    {
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'GET':
                parent::view("Login", "login.php",
                    null, null, null,
                    "layout-signin.php");
                break;

            case 'POST':
                $userCredentials = new Login();
                $userCredentials->setUsername($_POST['username']);
                $userCredentials->setPassword($_POST['password']);

                $userManager = new UserManager($this->userRepository);
                $result = $userManager->signIn($userCredentials);

                if($result)
                {
                    header("location:/". APP_HOST );
                }
                else
                {
                    parent::view("Login", "login.php",
                        $userCredentials, null, $userManager->getMessages(),
                        "layout-signin.php");
                }
                break;

            default:
                break;
        }
    }

    /**
     * Perform sign up process.
     */
    public function signUp()
    {
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'GET':
                parent::view("Sign Up", "signup.php");
                break;

            case 'POST':
                $newUser = new UserAccount();
                $newUser->setEmail($_POST['email']);
                $newUser->setUsername($_POST['username']);
                $newUser->setPassword($_POST['password']);
                $newUser->setPassword2($_POST['password2']);

                $userManager = new UserManager($this->userRepository);
                $result = $userManager->signUp($newUser);
                if($result)
                {
                    header("location:/". APP_HOST . "account/login");
                }
                else
                {
                    parent::view("Sign Up","signup.php",
                        $newUser, null, $userManager->getMessages());
                }

                break;

            default:
                break;
        }
    }

    /**
     * Closes current session.
     */
    public function logout()
    {
        $userManager = new UserManager($this->userRepository);
        $userManager->closeSession();
        header("location:/" . APP_HOST . "account/login");
    }
}