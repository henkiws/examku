<?php

namespace App\Pattern\Interfaces;

interface UserInterface {

    public function findById($id);

    public function getAllPagination($page);
    
}