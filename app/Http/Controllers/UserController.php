<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function halamanDeteksi()
    {
        if (Auth::user()->is_role == 2) {
            return view('superadmin.dashboard');
        } elseif (Auth::user()->is_role == 1) {
             $data['getRecord'] = User::find(Auth::user()->id);
            return view('admin.dashboard',$data);
        } elseif (Auth::user()->is_role == 0) {
            $data['getRecord'] = User::find(Auth::user()->id);
            return view('user.halamandeteksi',$data);
        }
    }
}
