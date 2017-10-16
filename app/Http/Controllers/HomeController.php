<?php

namespace App\Http\Controllers;

use App\Blockings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Scans;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::whereHas('student')->get();
        $staff = User::whereHas('staff')->get();
        $blocked_users = Blockings::with(['student','staff'])->get();
        $user_traffic = Scans::with(['staff','students'])->get();
        return view('home',['students'=>$students,'staff'=>$staff,'blocked_users'=>$blocked_users,'user_traffic'=>$user_traffic]);
    }

    public function logout(){
        Auth::logout();
        return view('auth.login');
    }

}
