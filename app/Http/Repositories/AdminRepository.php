<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AdminRepositoryInterface;
use App\Models\city;
use App\Models\item;
use App\Models\request;
use App\Models\User;

class AdminRepository implements AdminRepositoryInterface {

    private $user_model;
    private $city_model;
    private $item_model;
    private $request_model;

    public function __construct(User $user, city $city, item $item, request $request)
    {
        $this->user_model = $user;
        $this->city_model = $city;
        $this->item_model = $item;
        $this->request_model = $request;
    }

    public function dashboard()
    {
        return  $this->index();
    }

    public function login()
    {
        return view('dashboard.login');
    }

    public function loginForm($request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = request(['email', 'password']);
        $user = auth()->attempt($credentials);

        if($user) {
            return redirect(route('dashboard.index'));
        }

        session()->flash('message', 'Email or Password is Invalid');
        return $this->dashboard();

    }

    public function index(){
        $cities = $this->city_model::get();
        return view('dashboard.index', compact(['cities']));
    }

    public function addItem($request){
        $request->validate([
            'name' => 'required',
            'city_id' => 'required',
            'body' => 'required',
            'color' => 'required',
            'wight' => 'required',
            'image' => 'required',
        ]);


        if($request->hasFile('image')){
            $img = $request->file('image');
            $extension = $img->getClientOriginalExtension();
            $fileName = time().'_image.'.$extension;
            $img->move(public_path("/images") , $fileName);
        }else{
            $fileName = "non";
        }

        $this->item_model::create([
            'name' => $request->name,
            'city_id' => $request->city_id,
            'body' => $request->body,
            'color' => $request->color,
            'wight' => $request->wight,
            'image' => $fileName,
        ]);

        session()->flash('message', 'Item Was Added');
        return $this->index();
    }

    public function allItems()
    {
        $items = $this->item_model::get();
        return view('dashboard.items', compact(['items']));
    }

    public function deleteItem($id)
    {
        $item = $this->item_model::find($id)->delete();
        session()->flash('message', 'Item Was Deleted');
        return $this->allItems();
    }

    public function allRequests()
    {
        $requests = $this->request_model::with('item_data')->get();
        return view('dashboard.requests', compact(['requests']));
    }
}
