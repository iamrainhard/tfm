<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Models\Salary;
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

        //Get data for picker Dashboard
        if($user->role == 'picker') {
            $monthlySumProds = Production::where('user_id', $user->id)->whereMonth('created_at', now()->month)->sum('quantity');
            $latestProds = Production::where('user_id', $user->id)->latest()->take(5)->get();
            $sumProds = Production::where('user_id', $user->id)->sum('quantity');
            $salary = $user->salary;
            $prodNum = $sumProds - (count(Production::where('user_id', $user->id)->get()) * 17);
            if($prodNum > 0) {
                $commission = $prodNum * $salary->commission;
            } else{
                $commission = 0;
            }
//            dd($latestProds);
        }


        //redirect dashboard according to the role
        if ($user->role == 'picker'){
            return view('home',compact('monthlySumProds','sumProds','salary', 'commission', 'latestProds'));
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
