<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jon;

class UserController extends Controller
{
    public function create(){
        return view('dashboard.user.user');
    }
    public function index(){
        $users=Jon::all();

        return view('dashboard.user.users',compact('users'));
    }
}
