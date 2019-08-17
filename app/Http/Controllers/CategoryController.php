<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    //
    public function index()
    {
    	$categories = Category::all();
    	return view('category.index',compact('categories'));
    }

    public function add()
    {
    	return view('category.add');
    }
    public function store(Request $request)
    {
    	 $validatedData = $request->validate([
        'name' => 'required|min:6|max:255',
    ]);
    	$category = new Category;
    	$category->name = $request->name;
    	$category->save();
    	return redirect('/categories');
    }
    public function delete($id)
    {
    	$categories = Category::find($id);
    	$categories->delete();
    	return redirect('/categories');
    }
    public function edit($id)
    {

    	$categories = Category::find($id);
    	return view('category.edit',compact('categories'));
    	
    }
    public function update(Request $request,$id)
    {
    	 	 	 $validatedData = $request->validate([
        'name' => 'required|min:6|max:255',
    ]);
   
    	$categories = Category::find($id);
    	$categories->name = $request->name;
    	$categories->update();
    	return redirect('/categories');
    }
}
