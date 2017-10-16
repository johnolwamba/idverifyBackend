<?php

namespace App\Http\Controllers;

use App\Gates;
use Illuminate\Http\Request;
use app\User;

class StaffController extends Controller
{
    public function index(){
        $staff = User::whereHas('staff')->with('staff.gate')->get();
        return view('staff', ['staff' => $staff]);
    }

    public function getStaff($id){
        $viewstaff = User::with('staff','staff.gate')->where(['id'=> $id])->first();
        if (!$viewstaff) {
            abort(404);
        }
        $gates = Gates::all();
        return view('viewstaff', ['staff' => $viewstaff, 'id' => $id,'gates' => $gates]);
    }

    public function deleteStaff($id){
        $staff = User::where(['id' => $id])->first();
        if (!$staff) {
            abort(404);
        }
        try {
            $staff->delete();
        } catch (QueryException $e) {
            if ($e->getCode() == "23000") {
                return back()->withErrors('You cannot delete an item that is referenced somewhere else');
            }
        }
        return redirect()->route('staff')->with('success', 'Staff has been deleted Successfully');
    }


    public function updateStaff(Request $request,$id){

    }

    public function addStaffPost(Request $request){

    }

    public function unblockStaff($id){
        $staff = User::where(['id' => $id])->with(['staff'])->first();
        if (!$staff) {
            abort(404);
        }

        $staff->status = "1";
        $staff->save();

        return redirect()->route('staff',$id)->with('success', 'Staff has been unblocked Successfully');
    }



}
