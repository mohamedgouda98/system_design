<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\UserRepositoryInterface;
use App\Models\city;
use App\Models\item;
use App\Models\request;

class UserRepository implements UserRepositoryInterface {

    private $city_model;
    private $item_model;
    private $request_model;

    public function __construct(city $city, item $item, request $request)
    {
        $this->city_model = $city;
        $this->item_model = $item;
        $this->request_model = $request;
    }

    public function homeData()
    {
        $cities = $this->city_model::get();
        $items = $this->item_model::get();
        return view('index', compact(['cities', 'items']));
    }

    public function search($request)
    {
        $cities = $this->city_model::get();

        $items = $this->item_model::where([
            ['city_id', $request->city_id],
            ['name', 'LIKE', '%'. $request->name .'%']
        ])->get();
        return view('index', compact(['cities', 'items']));
    }

    public function request($id)
    {
        return view('request', compact(['id']));
    }

    public function addRequest($request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $this->request_model::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'item_id' => $request->item_id
        ]);
        session()->flash('message', 'Request Was Created');
       return $this->homeData();

    }
}
