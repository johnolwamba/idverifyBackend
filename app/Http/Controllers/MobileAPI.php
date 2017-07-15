<?php

namespace App\Http\Controllers;

use App\Blockings;
use App\Scans;
use App\User;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MobileAPI extends Controller
{

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_number' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return $this->response->array(['status'=>'error', 'error' => ['code'=>'input_invalid','message' =>$validator->errors()->all()]])->setStatusCode(422);
        }

        $id_number = $request->input('id_number');

        $credentials = [];
        $credentials['id_number'] = $id_number;
        $credentials['password'] = $request->input('password');

        try {
            // verify the credentials and create a token for the user
            if (Auth::attempt($credentials)) {
                $user = User::where('id_number', $id_number)->first();
                if ($user->status == 0) {
                    return Response::json(array(['status' => 'error', 'error' => ['code' => 'invalid_credentials', 'message' => ['This account has been blocked']]]));
                }else{
                    return Response::json(array(['status'=>'success', 'token'=>'$token']));
                }
            }
            else{
                return Response::json(array(['status' => 'error', 'error' => ['code' => 'invalid_credentials', 'message' => ['Incorrect ID number/password']]]));
                }

        } catch(\Exception $e){
            return Response::json(array(['status'=>'error', 'error' => ['code'=>'invalid_credentials','message'=>['No Account found for this ID number']]]));
        }
    }



    //scan
    public function scanUser(Request $request){
        //validation
        $validator = Validator::make($request->all(), [
            'id_number'=>'required|exists:users,id_number',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all(), 'status' => 400], 200);
        }

        $student = User::where(['id_number'=>$request->get('id_number')])->with(['students'])->first();

        $scans = new Scans();
        $scans->staff_id = 1;
        $scans->student_id = $student->id;
        $scans->save();

        return Response::json(array('status' => 'success','student' => $student));

    }



    //scan
    public function blockUser(Request $request){
        //validation
        $validator = Validator::make($request->all(), [
            'id_number'=>'required|exists:users,id_number',
            'description'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all(), 'status' => 400], 200);
        }

        $student = User::where(['id_number'=>$request->get('id_number')])->with(['students'])->first();

        $blockings = new Blockings();
        $blockings->staff_id = 1;
        $blockings->student_id = $student->id;
        $blockings->description = $request->get('description');
        $blockings->save();

        if($blockings->save()){
            $user = User::where(['id_number'=>$request->get('id_number')])->first();
            $user->status = 0;
            $user->save();
        }

        return Response::json(array('status' => 'success','message' => 'Student has been Blocked'));

    }




}
