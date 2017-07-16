<?php

namespace App\Http\Controllers;

use App\Blockings;
use App\Scans;
use App\User;
use Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MobileAPI extends Controller
{

    //logout
    public function logout(){
        $user = User::find(Auth::user()->id);
        $user->api_token = '';
        $user->save();
        return Response::json(['message' => 'Logout success'], 200);
    }


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

                    $token = bcrypt($id_number.$request->input('password'));

                    $user->api_token = $token;
                    $user->save();

                    return Response::json(array(['status'=>'success','token'=>$token]));
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
        $closing_time = Carbon::now()->startOfDay()->addHour(19);
        $opening_time = Carbon::now()->startOfDay()->addHour(7);
        $check_if_closed = Carbon::now()->diffInMinutes($closing_time, false);
        $check_if_opened = Carbon::now()->diffInMinutes($opening_time, false);


        if(Carbon::now()->dayOfWeek === Carbon::SUNDAY || Carbon::now()->dayOfWeek === Carbon::SATURDAY) {
            return Response::json(array(['status' => 'error','message' => 'Sorry this is no working day']));
        }else if($check_if_closed < 1){
            return Response::json(array('status' => 'error','message' => 'Sorry its beyond school hours.school is closed'));
        }else if($check_if_opened < 1){
            return Response::json(array('status' => 'error','message' => 'Sorry its not yet school hours.not opened'));
        }

        //validation
        $validator = Validator::make($request->all(), [
            'id_number'=>'required|exists:users,id_number',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all(), 'status' => 400], 200);
        }

        $student = User::where(['id_number'=>$request->get('id_number')])->with(['students'])->first();

        $scans = new Scans();
        $scans->staff_id = Auth::user()->id;
        $scans->student_id = $student->id;
        $scans->save();

        return Response::json(array('status' => 'success','student' => $student));

    }



    //scan
    public function blockUser(Request $request){
        $closing_time = Carbon::now()->startOfDay()->addHour(19);
        $opening_time = Carbon::now()->startOfDay()->addHour(7);
        $check_if_closed = Carbon::now()->diffInMinutes($closing_time, false);
        $check_if_opened = Carbon::now()->diffInMinutes($opening_time, false);


        if(Carbon::now()->dayOfWeek === Carbon::SUNDAY || Carbon::now()->dayOfWeek === Carbon::SATURDAY) {
            return Response::json(array(['status' => 'error','message' => 'Sorry this is no working day']));
        }else if($check_if_closed < 1){
            return Response::json(array('status' => 'error','message' => 'Sorry its beyond school hours.school is closed'));
        }else if($check_if_opened < 1){
            return Response::json(array('status' => 'error','message' => 'Sorry its not yet school hours.not opened'));
        }
        
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
        $blockings->staff_id = Auth::user()->id;
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



    public function getAuthenticatedUser()
    {
        $user = Auth::user();
        return Response::json(array('status' => 'success','user' => $user));
    }




}
