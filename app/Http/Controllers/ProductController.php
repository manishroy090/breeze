<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create(){
        return view('dashboard.addproduct');
    }
  public function store(Request $request){


        $product = new Product();
        $product->email = $request['email'];
        $product->productname = $request['productname'];
        $product->title=$request['title'];
        $product->summary = $request['summary'];
        $filename = time() . "product." . $request->file('img')->guessExtension();
        $request->file('img')->storeAs('uploads',$filename,'public');
        $product->img = $filename;
        $product->ed = $request['ed'];
        $product->quality = $request['quality'];
        $product->description = $request['description'];
        $product->save();
        return redirect('product');
  }
  public function index(){
        return view('dashboard.products');

  }

}
