<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scans;

class ScansController extends Controller
{
    public function index(){
        $user_traffic = Scans::with(['staff','students'])->orderBy('created_at', 'DESC')->get();
        return view('scans',['user_traffic'=>$user_traffic]);
    }
}
