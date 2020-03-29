<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
}
