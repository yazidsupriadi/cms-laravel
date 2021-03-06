<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    //
    public function index()
    {
    	$users = User::all();
    	return view('users.index',compact('users'));
    }

    public function makeadmin($id)
    {
    	$user = User::find($id);
    	$user->role = 'admin';
    	$user->save();
    	return redirect('/users');
    }
}
