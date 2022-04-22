<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function show_post(Request $request){
        // $posts = Post::all();
        $userid = $request->user()->id;
        $posts = Post::where('user_id', $userid)->get();
        // $posts = Post::paginate(4);
        return view('dashboard', ['posts'=>$posts]);
    }

    public function json_api($id, Request $request)
    {
        if (isset($id)){
            $data = Post::where('id', $id)->first();
        return response()->json(['code' => 200, 'data' => $data], 200);
        } else {
            return response()->json(['code' => 500, 'data' => 'Data Not Found'], 200);
        }
    }

    public function xml_api($id, Request $request)
    {
        if (isset($id)){
            $data = Post::where('id', $id)->first();
        return response($data, 200)
            ->header('Content-Type', 'xml');
        } else {
            return response($data, 200)
            ->header('Data Not Found', 'xml');
        }

    }
}
