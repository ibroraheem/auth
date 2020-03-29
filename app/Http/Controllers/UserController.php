<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('users.edit');
    }
    public function edit(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->firstname = Request::input('firstname');
        $user->middlename = Request::input('middlename');
        $user->lastname = Request::input('lastname');
        $user->country = Request::input('country');
        $user->city = Request::input('city');
        $user->dateofbirth = Request::input('dateofbirth');
        $user->save();
        return view('home');
    }
    public function profile()
    {
        return view('profile', array('user' => Auth::user()));
    }
    public function update_avatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('profile', array('user' => Auth::user()));
    }
}