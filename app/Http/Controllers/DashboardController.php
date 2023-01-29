<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //



    public function index($menu){
        $menus = Menu::query()->get();
       

        if($menus->count() > 0 ){
            foreach($menus as $menu){
                return view('menus/'.$menu->menulinks, compact('menus'));
            }
        }else{
            return view('welcome', compact('menus'));
        }
     }
     public function jon(){
        $menus = Menu::query()->get();


        return view('welcome',compact('menus'));
     }

}
