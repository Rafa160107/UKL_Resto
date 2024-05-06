<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\foodMOD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class foodCon extends Controller
{

    public function getFOOD(){
        $food = foodMOD::get();
        if($food){
            return response()->json(['status'=>true,'data'=>($food),'mesege'=>"Food has retrieved"]);
        }
        else{
            return response()->json(['status'=>false,'data'=>($food),'mesege'=>"Food has retrieved"]);
        }    

      }
    
    public function addFOOD(Request $req){

        if (!Auth::check()) {
            return response()->json([
                'message' => 'Login Dulu coy!',
            ], 401);
        }
        
        $validator=Validator::make($req->all(),[
            'name'=>'required',
            'spicy_level'=>'required',
            'price'=>'required',
            'image'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson());
        }

        $save=foodMOD::create([
            'name'=>$req->get('name'),
            'spicy_level'=>$req->get('spicy_level'),
            'price'=>$req->get('price'),
            'image'=>$req->get('image')
        ]);

        if($save){
            return response()->json(['status'=>true,'data'=>($save),'mesege'=>"Food has created"]);
        }else{
            return response()->json(['status'=>false,'data'=>($save),'mesege'=>"Food hasn't created"]);
        }
    }
    public function updateFOOD(Request $req,$id){

        if (!Auth::check()) {
            return response()->json([
                'message' => 'Login Dulu coy!',
            ], 401);
        }

        $validator=Validator::make($req->all(),[
            'name'=>'required',
            'spicy_level'=>'required',
            'price'=>'required',
            'image'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson());
        }
        $update=foodMOD::where('id',$id)->update([
            'name'=>$req->get('name'),
            'spicy_level'=>$req->get('spicy_level'),
            'price'=>$req->get('price'),
            'image'=>$req->get('image')
        ]);
        if($update){
            return response()->json(['status'=>true,'data'=>($update),'mesege'=>"Food has update"]);
        }else{
            return response()->json(['status'=>false,'data'=>($update),'mesege'=>"Food hasn't update"]);
        }
    }

    public function deleteFOOD($id){

        if (!Auth::check()) {
            return response()->json([
                'message' => 'Login Dulu coy!',
            ], 401);
        }

        $hapus=foodMOD::where('id',$id)->delete();
        if($hapus){
            return response()->json(['status'=>true,'data'=>($hapus),'mesege'=>"Food has deleted"]);
        }else{
            return response()->json(['status'=>false,'data'=>($hapus),'mesege'=>"Food hasn't deleted"]);
        }
    }

    public function searchFOODid($id){

        if (!Auth::check()) {
            return response()->json([
                'message' => 'Login Dulu coy!',
            ], 401);
        }

        $food=foodMOD::where('id',$id)->get();
        if($food){
            return response()->json(['status'=>true,'data'=>($food),'mesege'=>"Food has retrieved"]);
        }
        else{
            return response()->json(['status'=>false,'data'=>($food),'mesege'=>"Food has retrieved"]);
        }  
    }
}


