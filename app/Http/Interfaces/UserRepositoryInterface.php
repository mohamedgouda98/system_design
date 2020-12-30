<?php

namespace App\Http\Interfaces;

interface UserRepositoryInterface{

    public function homeData();

    public function search($request);

    public function request($id);

    public function addRequest($request);

}
