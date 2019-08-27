<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Session;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();

        $categories = Category::all();
        return view('posts.index',compact('posts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    //uploading image
        if ($request->hasFile('image')) {
            $request->file('image')->move(public_path('image/posts/'),$request->file('image')->getClientOriginalName());
        $posts = new Post;
        $posts->title = $request->title;
        $posts->description = $request->description;
        $posts->content = $request->content;
        $posts->image = $request->file('image')->getClientOriginalName();
        $posts->category_id = $request->category_id;
        $posts->published_at = $request->published_at;
        $posts->save();
    }
        Session::flash('success','You have created post successfully');
        
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $posts = Post::find($id);
        $categories = Category::all();
        return view('posts.edit',compact('posts','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->description = $request->description;
        $posts->content = $request->content;
        if ($request->hasFile('image')) {
            $request->file('image')->move(public_path('image/posts/'),$request->file('image')->getClientOriginalName());
            $posts->image = $request->file('image')->getClientOriginalName();
            
            
        }
        $posts->published_at = $request->published_at;
        $posts->update();
        Session::flash('success','You have edited post successfully');
        
        return redirect('/posts');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $posts = Post::withTrashed()->where('id',$id)->first();
        if ($posts->trashed()) {
            $posts->forceDelete();  
        }else{
            $posts->delete();
        
        }
        Session::flash('success','You have deleted post successfully');
        
        return redirect('/posts');
    }

    public function trashed(){

        $trashed = Post::onlyTrashed()->get();
        return view('posts.trashed',compact('trashed'));
    }

    public function restore($id)
    {
        $posts = Post::withTrashed()->where('id',$id)->first();
        $posts->restore();
        Session::flash('success','You have restored post successfully');
        return redirect()->back();
    }
}
