<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    public function index(){

        return view('frontend.post.index');
    }


    public function create(){
        return view('frontend.post.create');
    }


    public function create_post(Request $request)
    {

        // $validator = Validator::make($request->all(), [
        //     'title' => 'required|unique:posts|max:255',
        //     'body' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return redirect('post/create')
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect()->back()->with("message","post created successfully");
    }
}
