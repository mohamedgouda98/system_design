<?php

namespace App\Http\Interfaces;

interface AdminRepositoryInterface{

    public function dashboard();

    public function loginForm($request);

    public function login();

    public function index();

    public function addItem($request);

    public function allItems();

    public function deleteItem($id);

    public function allRequests();
}
