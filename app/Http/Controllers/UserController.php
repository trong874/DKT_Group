<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $page_title = 'Trang quản người dùng';
        $page_description = 'is description';
        $users = User::all();
        return view('backend.users.list',compact('page_title','page_description','users'));
    }

    public function changeAvatar(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->image_path = $request->image_path;
        $user->save();
        return response()->json($user);
    }
}
