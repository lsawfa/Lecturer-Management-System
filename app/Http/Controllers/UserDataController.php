<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDataController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $profile = UserData::where("user_id",Auth::user()->getAuthIdentifier())->first();
            return view('profile.profile',compact('profile'));
        }else{
            return view('login');
        }
    } 
}
