<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Students;
use App\User;
use Illuminate\Http\Request;

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

        $courses = Courses::get();

        return view('student', ['student' => $student,'courses' => $courses]);
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

    public function unblockStudent($id){
        $student = User::where(['id' => $id])->with(['student','student.course'])->first();
        if (!$student) {
            abort(404);
        }

        $student->status = "1";
        $student->save();

        return redirect()->route('student',$id)->with('success', 'Student has been unblocked Successfully');
    }


}
