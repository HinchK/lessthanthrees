<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Auth;

class ItemsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function readItems() {
        $faves = Item::all();
        return $faves;
    }

    public function storeItem(Request $request) {
        $data = new Item();
        $data->name = $request->name;
        $data->user_id = Auth::user()->id;
        $data->save();
        return $data;
    }

    public function deleteItem(Request $request) {
        Item::find($request->id)->delete ();
    }
}
