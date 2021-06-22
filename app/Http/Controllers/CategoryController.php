<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
      return response()->json([
        'status'=>true
      ]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
          'name'=>'required'
        ]);

        $category = new Category;
        $category->name = $request->name;
        
          $category->save();

          return response()->json([
            'status'=> true,
            'data' => $category
          ]);

        
    }

    public function categories(){
      return response()->json([
        'status'=> true,
        'data' => Category::all()
      ]);
    }

    public function getSingleCategory($id){
      $category = Category::find($id);

      return response()->json([
        'status'=> true,
        'data' => $category
      ]);
    }

    public function getCategoryProducts(Request $request, $id){
      $category = Category::find($id);
      $category_products = $category->products->where('category_id', $id)->get();
      
      return response()->json([
        'status'=> true,
        'data' => $product
      ]);
      
    }

    public function update($id, Request $request){
      $category = Category::find($id);

      $category->name = $request->name;

      $category->save();

      return response()->json([
        'status'=> true,
        'success' => 'Update successful',
        'data' => $category
      ]);
    }

    public function delete($id){
      $category = Category::findorfail($id)->delete();

      return response()->json([
        'status'=> true,
        'success' => 'Delete successful',
      ], 200);
    }
}
