<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\productResource;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $product= Product::all();
        return productResource::collection($product);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name'=>'required',
            'category'=>'required',
            'title'=>'required',
            'summary'=>'required',
            'img'=>'required',
            'ed'=>'required',
            'quality'=>'required',
            'description'=>'required'


        ];
        $validator=validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }
        else{
            $product=new Product;
            $product->name=$request->name;
            $product->category=$request->category;
            $product->title=$request->title;
            $product->summary=$request->summary;
            $filename = time() . "product." . $request->file('img')->guessExtension();
            $request->file('img')->storeAs('uploads', $filename, 'public');
            $product->img = $filename;
            $product->ed=$request->ed;
            $product->quality=$request->quality;
            $product->description=$request->description;
            $result=$product->save();
            if($result){
                return ["Result"=>"Data stored Successfully"];
            }
            else{
                return ["Result"=>"operation successfully"];
            }

        }




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::where('id',$id)->first();
        return $product;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
