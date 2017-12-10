<?php

namespace App\Http\Controllers;

use App\Blockings;
use App\Courses;
use App\Students;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    public function index(){
        $students = User::whereHas('student')->get();
        return view('students', ['students' => $students]);
    }

    public function getStudent($id){
        $student = User::where(['id' => $id])->with(['student','student.course'])->first();
        if (!$student) {
            abort(404);
        }

        $student_blockings = Blockings::where(['student_id'=>$student->student->id])->get();

        $courses = Courses::get();

        return view('student', ['student' => $student,'courses' => $courses,'student_blockings'=>$student_blockings]);
    }

    public function updateStudent($id){

    }

    public function deleteStudent($id){
        $student = User::where(['id' => $id])->first();
        if (!$student) {
            abort(404);
        }
        try {
            $student->delete();
        } catch (QueryException $e) {
            if ($e->getCode() == "23000") {
                return back()->withErrors('You cannot delete an item that is referenced somewhere else');
            }
        }
        return redirect()->route('students')->with('success', 'Student has been deleted Successfully');
    }

    public function unblockStudent(Request $request,$id){
        $rules = [
            'recommendation' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $student = User::where(['id' => $id])->with(['student','student.course'])->first();
        if (!$student) {
            abort(404);
        }

        $student->status = "1";
        $student->save();

        $blockedUser = Blockings::where(['student_id' =>$student->student->id])->orderBy('id', 'desc')->first();

        $blockedUser->recommendation = $request->input('recommendation');
        $blockedUser->unblocker_id = Auth::user()->id;
        $blockedUser->unblock_date = Carbon::now()->format('Y-m-d H:i:s');
        $blockedUser->save();

        return redirect()->route('student',$id)->with('success', 'Student has been unblocked Successfully');
    }


    public function generateToken($id){
       $student = Students::with('user')->where(['user_id'=>$id])->first();
       $student->qr_code = bcrypt($student->user->email.$student->user->password);
       $student->save();
        return redirect()->route('student',$id)->with('success', 'Student token has been regenerated');
    }

}
