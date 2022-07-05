<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use Validator;

class MusicController extends Controller
{
    public function show(){
        
        $music = Music::paginate(12);
        return response()->json($music);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'album_id' => 'required',
            'title' => 'required|string|max:100',
            'duration' => 'required|string|max:6',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }        
        $music = Music::create([
        	'album_id'=>$request->get('album_id'),
        	'title'=>$request->get('title'),
        	'duration'=>$request->get('duration'),
        ]);
        if($music){
        	return response()->json([
            'status'=>'music added successfully',
            'data'=>$music
        ]);
            
        } else {
        	return response()->json(['status'=>false]);
        }
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'album_id' => 'required',
            'title' => 'required|string|max:100',
            'duration' => 'required|string|max:6',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }  
        $music = Music::where('id',$id)->update([
        	'album_id'=>$request->get('album_id'),
        	'title'=>$request->get('title'),
        	'duration'=>$request->get('duration'),
        ]);
        if($music){
        	return response()->json(['status'=>'data changed successfully']);
        } else {
        	return response()->json(['status'=>false]);
        }
    }
    public function delete($id){
    	$music = Music::where('id',$id)->delete();
        if($music){
        	return response()->json(['status'=>'music deleted']);
        } else {
        	return response()->json(['status'=>false]);
        }
    }
}
