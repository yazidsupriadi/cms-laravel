<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
class BerandaController extends Controller
{
    //
    public function welcome()
    {
    	$posts = Post::all();
    	$categories = Category::all();
    	return view('frontend.welcome',compact('posts','categories'));
    }

    public function post($id)
    {
    	$posts = Post::all();
    	$categories = Category::all();
		return view('frontend.post',compact('posts','categories'));
        		
    }
}
