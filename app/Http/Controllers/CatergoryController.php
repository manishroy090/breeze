<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CatergoryController extends Controller
{
    public function index()
    {
    $categories=  Category::query()->get();


    return view('dashboard.category.category', compact('categories'));

}
    public function store(Request $request)
    {
        $data=$this->validate($request,[
            'category'=>'required'

        ]);
       $category= Category::create($data);


     return response()->json([
        'storeresult'=>"Product Added Successfully",

        'data'=>$category
     ]);


    }
    public function edit($id)
    {
        $category=Category::where('id', $id)->get();

        return response()->json([
            'data'=>$category
        ]);
    }
    public function update(Request $request, $id)
    {
        $category=Category::find($id);

      $category->category=$request->category;
       $category->save();
       return response()->json([
        'data'=>$category
       ]);
    }
   public function delete($id){
        $category=Category::find($id);
        return response()->json([
            'data'=>$category
        ]);       

    }
}
