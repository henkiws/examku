<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pattern\Interfaces\UserInterface as UserInterface;

class HomeController extends Controller
{
    private $userRepository;
 
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return $user = $this->userRepository->getAllPagination(5);
    }
    
    public function find($id)
    {
        return $user = $this->userRepository->findById($id);
    }
}
