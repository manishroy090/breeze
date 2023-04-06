<?php

namespace App\Http\Controllers;
use App\Models\Menu;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function create(){
        $menus = Menu::query()->get();

        return view('dashboard.menu.menu',compact('menus'));
    }
    public function store(Request $request){

        $data = $this->validate($request,[
            'menu'=>'required',
            'menulinks'=>'required'
        ],['required'=>':attribute is required']);
       $menu =  Menu::create($data);

        return response()->json([
           'data' => $menu,
           'success'=>'Menu Created'
        ],200);

    }
    public function delete($id){
        $menu = Menu::where('menuid', $id);
        $menu->delete();
    }
    public function edit($id){
        $menu = Menu::where('menuid', $id)->get();
        return response()->json(
         ['data'=>$menu],200
        );

    }

    public function update(Request $request, $id){
        $data = [
            'menu' => $request->menu,
            'menulinks' => $request->menulinks
        ];
        Menu::where('menuid', $id)->update($data);
    }

}
