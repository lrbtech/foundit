<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\city;
use App\Models\language;
use Auth;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function saveCity(Request $request){
        $request->validate([
            'city'=>'required',
        ]); 

        $city = new city;
        $city->city = $request->city;
        $city->lat = $request->lat;
        $city->lng = $request->lng;
        $city->parent_id = 0;
        $city->save();
        return response()->json('successfully save'); 
    }
    public function updateCity(Request $request){
        $request->validate([
            'city'=> 'required',
        ]);
        
        $city = city::find($request->id);
        $city->city = $request->city;
        $city->lat = $request->lat;
        $city->lng = $request->lng;
        $city->parent_id = 0;
        $city->save();
        return response()->json('successfully update'); 
    }

    public function City(){
        $city = city::where('parent_id',0)->get();
        $language = language::all();
        return view('admin.city',compact('city','language'));
    }

    public function editCity($id){
        $city = city::find($id);
        return response()->json($city); 
    }
    
    public function deleteCity($id,$status){
        $city = city::find($id);
        $city->status = $status;
        $city->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


    public function saveArea(Request $request){
        $request->validate([
            'area'=>'required',
        ]); 

        $city = new city;
        $city->city = $request->area;
        $city->parent_id = $request->parent_id;
        $city->save();
        return response()->json('successfully save'); 
    }

    public function updateArea(Request $request){
        $request->validate([
            'area'=> 'required',
        ]);
        
        $city = city::find($request->id);
        $city->city = $request->area;
        $city->parent_id = $request->parent_id;
        $city->save();
        return response()->json('successfully update'); 
    }

    public function Area($id){
        $area = city::where('parent_id',$id)->get();
        $parent_id = $id;
        $language = language::all();
        return view('admin.area',compact('area','parent_id','language'));
    }

    public function editArea($id){
        $city = city::find($id);
        return response()->json($city); 
    }
    
    public function deleteArea($id,$status){
        $city = city::find($id);
        $city->status = $status;
        $city->save();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


}
