<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function edit(User $user)
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }
    public function update(User $user)
    {
        if (Auth::user()->email == request('email')) {
            $this->validate(request(), [
                // 'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed'
            ]);
            // 'email' => 'required|email|unique:users',
            $user->firstname = request('firstname');
            $user->middlename = request('middlename');
            $user->lastname = request('lastname');
            $user->country = request('country');
            $user->city = request('city');
            $user->dateofbirth = request('dateofbirth');

            $user->save();

            return back();
        } else{
            $this->validate(request(), [
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed'
                ]);
                // 'email' => 'required|email|unique:users',
                $user->firstname = request('firstname');
                $user->middlename = request('middlename');
                $user->lastname = request('lastname');
                $user->country = request('country');
                $user->city = request('city');
                $user->dateofbirth = request('dateofbirth');

                $user->save();

                return back();
            }
    }

}
