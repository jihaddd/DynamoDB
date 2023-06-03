<?php

namespace App\Http\Controllers;
use App\Catagory;
use Illuminate\Http\Request;

class test extends Controller
{
    function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $data = Catagory::scan();
            echo json_encode($data);
        }
    }

    function add_catagory(Request $request)
    {
        $request->validate([
            'name_catagory' => 'required|string|max:10|regex:/(^([a-zA-z]+)(\d+)?$)/u',
            'id_catagory' => 'required|string|max:10|regex:/(^([0-9]+)(\d+)?$)/u',
        ]);
        
        
        $Catagory = new Catagory([
            'name_catagory'    =>  $request->name_catagory,
            'id_catagory'    =>  $request->id_catagory,
            // 'sub_catagory'     =>  $request->sub_catagory,
            // 'name_sub_branch'     =>  $request->name_sub_branch,
        ]);
        
        $Catagory->save();

       
        // return back()->with('success','Add secssefly');
        return response()->json($Catagory);
    }

    public function add_sub_catagory(Request $request)
    {
        $request->validate([
            'name_catagory' => 'required|string|max:10|regex:/(^([a-zA-z]+)(\d+)?$)/u',
            'id_catagory' => 'required|string|max:10|regex:/(^([0-9]+)(\d+)?$)/u',
            'sub_catagory' => 'required|string|max:10|regex:/(^([a-zA-z]+)(\d+)?$)/u',
            'name_sub_branch' => 'required|string|max:10|regex:/(^([a-zA-z]+)(\d+)?$)/u',
        ]);
      
        $Catagory = new Catagory([
            'name_catagory'    =>  $request->name_catagory,
            'id_catagory'    =>  $request->id_catagory,
            'sub_catagory'     =>  $request->sub_catagory,
            'name_sub_branch'     =>  $request->name_sub_branch,
        ]);
        
        $Catagory->save();
        return response()->json($Catagory);
    }


   
}
