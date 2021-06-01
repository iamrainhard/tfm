<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        Get login user
        $user = Auth::user();

        //redirect dashboard according to the role
        if ($user->role == 'picker'){
            return view('home');
        }elseif($user->role == 'supervisor'){
            return view('supervisor.dashboard');
        }else{
            return view('admin.dashboard');
        }
//        return view('home');
    }

    public function profile()
    {
        return view('profile');
    }
}
