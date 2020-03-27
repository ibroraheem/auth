<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Request;

class EditmailController extends Controller
{
    public function index()
    {
        return view('editmail');
    }
   public function updatemail(Request $request)
 {
    $id = Auth::user()->id;
    $user = User::find($id);
    $user->email = Request::input('email');
  $user->save();
    return view('auth/verify');
 }
}
