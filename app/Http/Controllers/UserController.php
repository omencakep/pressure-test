<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    public function show(){
        return User::all();
    }
    public function create(){
        
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:100',
            // 'username' => 'required|string|max:100',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }        
        $user = User::where('id',$id)->update([
        	'full_name'=>$request->get('full_name'),
        	// 'username'=>$request->get('username'),
        ]);
        if($user){
        	return response()->json(['status'=>'data changed successfully']);
        } else {
        	return response()->json(['status'=>false]);
        }
    }

    public function delete($id){
    	$user = User::where('id',$id)->delete();
        if($user){
        	return response()->json(['status'=>'data deleted']);
        } else {
        	return response()->json(['status'=>false]);
        }
    }

    }

