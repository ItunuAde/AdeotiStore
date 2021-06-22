<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /public function index()
    {
      return response()->json([
        'status'=>true
      ]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
          'name'=>'required',
          'address'=>'required',
          'LGA' => 'required',
          'state' => 'required',
          'email'=>'required',
          'telephone'=>'required',
          'product'=>'required',
          'price'=>'required',
          'quantity'=>'required',
          'status' => 'required',
          'total'=>'required'
        ]);

        $order = new Order;
        $order->product_id = $request->product_id;
        $order->name = $request->name;
        $order->address = $request->address;
        $order->LGA = $request->LGA;
        $order->state = $request->state;
        $order->email = $request->email;
        $order->telephone = $request->telephone;
        $order->product = $request->product;
        $order->price = $request->price;
        $order->quantity = $request->quantity;
        $order->status = 'Pending';
        $order->total = $request->total;

        if ($order->status == 0){
          $order->status = 'Pending';
        }
        else if ($order->status == 1){
          $order->status = 'Delivered';
        }
        else{
          $order->status = 'Cancelled';
        }
        
        $order->save();

        return response()->json([
          'status'=> true,
          'data' => $order
        ]);

        
    }

    public function order(){
      // return response()->json([
      //   'status'=> true,
      //   'data' => Order::all()
      // ]);

      $max = Order::where('status', 'Delivered')->orderBy('total', 'desc')->take(10)->get();
      $fetch_deleted = Order::where('deleted_at' )
      return response()->json([
        'status'=> true,
        'data' => $max
      ]); 
    }

    public function getSingleOrder($id){
      $order = Order::find($id);

      return response()->json([
        'status'=> true,
        'data' => $order
      ]);
    }

    public function update(Request $request, $id){
        $order = Order::find($id);
  
        $order->product_id = $request->product_id;
        $order->name = $request->name;
        $order->address = $request->address;
        $order->LGA = $request->LGA;
        $order->state = $request->state;
        $order->email = $request->email;
        $order->telephone = $request->telephone;
        $order->product = $request->product;
        $order->price = $request->price;
        $order->quantity = $request->quantity;
        $order->status = $request->status;
        $order->total = $request->total;

        if ($order->status == 0){
          $order->status = 'Pending';
        }
        else if ($order->status == 1){
          $order->status = 'Delivered';
        }
        else{
          $order->status = 'Cancelled';
        }
  
        $order->save();
  
        return response()->json([
          'status'=> true,
          'message' => 'Update successful',
          'data' => $order
        ]);
    }

    public function updateBulk(Request $request, $id){
      $order = Order::find($id);

      $order->product_id = $request->product_id;
      $order->name = $request->name;
      $order->address = $request->address;
      $order->LGA = $request->LGA;
      $order->state = $request->state;
      $order->email = $request->email;
      $order->telephone = $request->telephone;
      $order->product = $request->product;
      $order->price = $request->price;
      $order->quantity = $request->quantity;
      $order->status = $request->status;
      $order->total = $request->total;

      $order->save();

      return response()->json([
        'status'=> true,
        'success' => 'Update successful',
        'data' => $order
      ]);
    }
}
