<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Musician;
use Illuminate\Pagination\Paginator;
use Validator;

class AlbumController extends Controller
{
    public function show(){
        $album = Album::paginate(12);
        return response()->json($album);

    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'musician_id' => 'required',
            'title' => 'required|string|max:100',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }        
        $album = Album::create([
        	'musician_id'=>$request->get('musician_id'),
        	'title'=>$request->get('title'),
        ]);
        if($album){
        	return response()->json([
            'status'=>'album added successfully',
            'data'=>$album
        ]);
            
        } else {
        	return response()->json(['status'=>false]);
        }
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'musician_id' => 'required',
            'title' => 'required|string|max:100',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }  
        $album = Album::where('id',$id)->update([
        	'musician_id'=>$request->get('musician_id'),
        	'title'=>$request->get('title'),
        ]);
        if($album){
        	return response()->json(['status'=>'data changed successfully']);
        } else {
        	return response()->json(['status'=>false]);
        }
    }
    public function delete($id){
    	$album = Album::where('id',$id)->delete();
        if($album){
        	return response()->json(['status'=>'album deleted']);
        } else {
        	return response()->json(['status'=>false]);
        }
    }
}
