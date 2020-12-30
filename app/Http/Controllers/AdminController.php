<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AdminRepositoryInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $AdminRepositoryInterface;

    public function __construct(AdminRepositoryInterface $AdminRepositoryInterface)
    {
        $this->middleware('auth')->except('login', 'loginForm');

        $this->AdminRepositoryInterface = $AdminRepositoryInterface;
    }

    public function dashboard(){
        return $this->AdminRepositoryInterface->dashboard();
    }

    public function login(){
        return $this->AdminRepositoryInterface->login();
    }

    public function loginForm(Request $request){
        return $this->AdminRepositoryInterface->loginForm($request);
    }

    public function index(){
        return $this->AdminRepositoryInterface->index();
    }

    public function addItem(Request $request){
        return $this->AdminRepositoryInterface->addItem($request);
    }

    public function allItems(){
        return $this->AdminRepositoryInterface->allItems();
    }

    public function deleteItem($id){
        return $this->AdminRepositoryInterface->deleteItem($id);
    }

    public function allRequests(){
        return $this->AdminRepositoryInterface->allRequests();
    }
}
