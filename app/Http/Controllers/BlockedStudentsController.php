<?php

namespace App\Http\Controllers;

use App\User;
use App\Blockings;
use Illuminate\Http\Request;

class BlockedStudentsController extends Controller
{
    public function index()
    {
        $blocked_users = Blockings::with(['student','staff'])->get();
        return view('blocked-students',['blocked_users'=>$blocked_users]);
    }
}
