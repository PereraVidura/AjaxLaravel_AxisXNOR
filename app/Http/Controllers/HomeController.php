<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function upload(Request $request)
    {
        $data=new Post;

        $data->title=$request->title;

        $data->description=$request->description;


        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('filefolder',$imagename);
        $data->image = $imagename;

        $data->save();

        return response()->json(['success'=>true,'message'=>'Data Uploaded Successfully']);
    }

}      
