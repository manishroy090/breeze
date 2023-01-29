<?php

namespace App\Http\Controllers;
use App\Models\Menu;

use Illuminate\Http\Request;

class AddmenuController extends Controller
{
    public function create(){
        $menus = Menu::query()->get();
        return view('dashboard.addmenu',compact('menus'));
    }
    public function store(Request $request){
        $menu = new Menu();
        $menu->menu = $request['menu'];
        $menu->menulinks = $request['menulinks'];
        $menu->save();
        return redirect('/addmenu/create');

    }
    public function delete($id){
        $menu = Menu::where('menuid', $id);
        $menu->delete();
        return redirect('/addmenu/create');

    }
    public function edit($id){
        $menu = Menu::where('menuid', $id)->get();

    }
}
