<?php
    namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Http\Request;

    class AdminController extends Controller
    {
        public function __construct()
        {
            $this->middleware('auth');
            $this->middleware('admin');
            
        }

        public function dashboard()
        {
            $users = User::where('is_admin', false)->get();
            $userCount = $users->count();
            $hamaCount = 25; // 
            $tanamanCount = 25; //

            return view('dashboard', compact('users', 'userCount', 'hamaCount', 'tanamanCount'));
        }

        public function users()
        {
            $users = User::where('is_admin', false)->get();
            return view('admin.users.index', compact('users'));
        }

    
    }