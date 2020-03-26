<?php
namespace App\Pattern\Repositories;
 
use App\Pattern\Interfaces\UserInterface as UserInterface;
use App\User;
 
class UserRepository implements UserInterface{
 
    protected $user;
 
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function findById($id)
    {
        return $this->user->find($id);
    }
    public function getAllPagination($page)
    {
        return $this->user->paginate($page);
    }
}