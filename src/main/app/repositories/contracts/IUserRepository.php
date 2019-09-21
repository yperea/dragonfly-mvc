<?php


namespace Dragonfly\App\Repositories\Contracts;


interface IUserRepository
{
    public function getUsers();
    public function getUserById($id);
    public function getUserByUsername($username);
    public function getUserByEmail($email);
    public function createUser($user);
}