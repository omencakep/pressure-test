<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musician;
use Illuminate\Pagination\Paginator;
use Validator;

class MusicianController extends Controller
{

    public function show(){
        $musician = Musician::paginate(12);
        return response()->json($musician);
        if($musician->isEmpty()){
            return response()->json(['there is no musician']);
        }
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }        
        $musician = Musician::create([
        	'name'=>$request->get('name'),
        ]);
        if($musician){
        	return response()->json([
            'status'=>'data added successfully',
            'musician'=>$musician
        ]);
            
        } else {
        	return response()->json(['status'=>false]);
        }
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }  
        $musician = Musician::where('id',$id)->update([
        	'name'=>$request->get('name'),
        ]);
        if($musician){
        	return response()->json(['status'=>'data changed successfully']);
        } else {
        	return response()->json(['status'=>false]);
        }
    }
    public function delete($id){
    	$musician = Musician::where('id',$id)->delete();
        if($musician){
        	return response()->json(['status'=>'data deleted']);
        } else {
        	return response()->json(['status'=>false]);
        }
    }
}
