<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show(){
        $menus = Menu::query()->get();


        return view('home.welcome',compact('menus'));
    }
}
