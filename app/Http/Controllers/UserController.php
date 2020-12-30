<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $UserRepositoryInterface;

    public function __construct(UserRepositoryInterface $UserRepositoryInterface)
    {
        $this->UserRepositoryInterface = $UserRepositoryInterface;
    }

    public function homeData(){
        return $this->UserRepositoryInterface->homeData();
    }

    public function search(Request $request){
        return $this->UserRepositoryInterface->search($request);
    }

    public function request($id){
        return $this->UserRepositoryInterface->request($id);
    }

    public function addRequest(Request $request){
        return $this->UserRepositoryInterface->addRequest($request);
    }



}
