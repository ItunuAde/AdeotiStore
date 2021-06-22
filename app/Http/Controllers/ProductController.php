<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return response()->json([
        'status'=>true
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request,[
          'title'=>'required',
          'description'=>'required',
          'price'=>'required',
          'availability'=>'required',
          'image'=>'required'
        ]);

        $product = new Product;
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->availability=$request->availability;
        $product->image=$request->image;
        
          $product->save();

          return response()->json([
            'status'=> true,
            'data' => $product
          ]);

        
    }

    public function product(){
      return response()->json([
        'status'=> true,
        'data' => Product::all()
      ]);
    }

    public function getSingleProduct($id){
      $product = Product::find($id);

      return response()->json([
        'status'=> true,
        'data' => $product
      ]);
    }

    public function getProductWithCategory($cat_id)
    { 
     
      $products = Product::where('category_id' , $cat_id)->with(['category:id,name'])->get();


      return response()->json([
        'status'=> true,
        'data' => $products
      ]);
    }

    public function update(Request $request, $id){
      $product = Product::find($id);

      $product->category_id = $request->category_id;
      $product->title = $request->title;
      $product->description = $request->description;
      $product->price = $request->price;
      $product->availability = $request->availability;
      $product->image = $request->image;

      $product->save();

      return response()->json([
        'status'=> true,
        'success' => 'Update successful',
        'data' => $product
      ]);
    }

    public function delete($id){
      $product = Product::findorfail($id)->delete();

      return response()->json([
        'status'=> true,
        'success' => 'Delete successful',
      ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
   
}
