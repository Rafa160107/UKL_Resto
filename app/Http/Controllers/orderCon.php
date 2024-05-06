<?php

namespace App\Http\Controllers;

use App\Models\order_detailMOD;
use App\Models\order_listMOD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class orderCon extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login', 'register']]);
    // }

    //menambah quantity
    public function tambahItem(Request $req, $id)
    {
        if (!Auth::check()) {
            return response()->json([
                'message' => 'Login Dulu coy!',
            ], 401);
        }

        $validator = Validator::make($req->all(), [
            'id_food' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $save = order_detailMOD::create([
            'id_food' => $req->input('id_food'),
            'quantity' => $req->input('quantity'),
            'id_order' => $id,
            'price' => $req->input('price'),
        ]);
        if ($save) {
            return response()->json(['status'=>true,'data'=>($save),'mesege'=>"Order has Successfully"]);
        } else {
            return response()->json(['status'=>false,'data'=>($save),'mesege'=>"Order hasn't Successfully"]);
        }
    }
    //order
    public function order(request $req){

        if (!Auth::check()) {
            return response()->json([
                'message' => 'Login Dulu coy!',
            ], 401);
        }

        $validator = Validator::make($req->all(), [
            'customer_name' => 'required',
            'table_number' => 'required',
            
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $save = order_listMOD::create([
            'customer_name' => $req->input('customer_name'),
            'table_number' => $req->input('table_number')
        ]);
        if ($save) {
            return response()->json(['status'=>true,'data'=>($save),'mesege'=>"Order List has created"]);
        } else {
            return response()->json(['status'=>false,'data'=>($save),'mesege'=>"Order List hasn't created"]);
        }
    }
    // menampilkan order
    public function getdetail($id)
    {
       $order=order_listMOD::where('id_order', $id)->get();
       $detail = order_detailMOD::where('id_order',$id)->get();

       $gather = $order->map(function($orderer) use ($detail){
        $orderer->setAttribute('order_detail', $detail);
        return $orderer;
       });

       $response=[
        'status'=> true,
        'data' => $gather,
        "message"=>'Order list has retrivied'
       ];
        return response()->json($response);
        
      
    
}
public function getdetailall()
{
   $order=order_listMOD::get();
   $detail = order_detailMOD::get();

   $gather = $order->map(function($orderer) use ($detail){
    $orderer->setAttribute('order_detail', $detail);
    return $orderer;
   });

   $response=[
    'status'=> true,
    'data' => $gather,
    "message"=>'Order list has retrivied'
   ];
    return response()->json($response);
    
  

}
}