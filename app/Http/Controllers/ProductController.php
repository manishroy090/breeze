<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function create()
    {  
           $categories=Category::query()->get();

        return view('dashboard.product.product',compact('categories'));
    }
  public function store(Request $request)
  {
      $data= $this->validate($request, [
           'name'=>'required',
           'category'=>'required',
           'title'=>'required',
           'summary'=>'required',
           'img'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
           'ed'=>'required',
           'quality'=>'required',
           'description'=>'required',
       ], [
           'required'=>':attribute is required'

       ]);
          $filename = time() . "product." . $request->file('img')->guessExtension();
          $request->file('img')->storeAs('uploads', $filename, 'public');
          $data['img']=$filename;
          Product::create($data);


      return response()->JSON([
          'sucess'=>"product added Sucessfully"
      ], 200);
  }
  public function index(Request $request)
  {
      $products = Product::query()->get();
      $categories=Category::query()->get();

      return view('dashboard.product.products', compact('products','categories'));
  }
  public function edit($id)
  {
      $product = Product::where('id', $id)->get();

      return response()->json($product);
  }
  public function update(Request $request, $id)
  {
      $product = Product::find($id);
      $product->name=$request->name;
      $product->category = $request->category;
      $product->title = $request->title;
      $product->summary = $request->summary;
      if ($request->hasFile('img')) {
          $filename = time() . "product." . $request->file('img')->guessExtension();
          $request->file('img')->storeAs('uploads', $filename, 'public');
          $product->img = $filename;
      }
      $product->ed = $request->ed;
      $product->quality = $request->quality;
      $product->description = $request->description;
      $product->save();

  }

  public function destroy($id)
  {
      $product =Product::where('id', $id);
      $product->delete();
  }
}
