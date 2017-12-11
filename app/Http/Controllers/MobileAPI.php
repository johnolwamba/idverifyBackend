<?php

namespace App\Http\Controllers;

use App\Blockings;
use App\Scans;
use App\Students;
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

                $is_student = Students::where('user_id', $user->id)->first();
                if($is_student != null){
                    return Response::json(array('status' => 'error', 'message' => 'Students are not allowed to use the application'));
                }


                if ($user->status == 0) {
                    return Response::json(array('status' => 'error', 'message' => 'This account has been blocked'));
                }else{

                    $token = bcrypt($id_number.$request->input('password'));

                    $user->api_token = $token;
                    $user->save();

                    return Response::json(array('status'=>'success','token'=>$token,'name'=>$user->name,'id_number'=>$user->id_number,'email'=>$user->email));
                }
            }
            else{
                return Response::json(array('status' => 'error', 'message' => 'Incorrect ID number/password'));
            }

        } catch(\Exception $e){
            return Response::json(array('status' => 'error', 'message' => 'No Account found for this ID number'));
        }
    }



    //scan
    public function scanUser(Request $request){
        $closing_time = Carbon::now()->startOfDay()->addHour(19);
        $opening_time = Carbon::now()->startOfDay()->addHour(7);
        $check_if_closed = Carbon::now()->diffInMinutes($closing_time, false);
        $check_if_opened = Carbon::now()->diffInMinutes($opening_time, false);

        //validation
        $validator = Validator::make($request->all(), [
            'qr_code'=>'required|exists:students,qr_code',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all(), 'status' => 400], 200);
        }

        if(Carbon::now()->gte($opening_time) && !Carbon::now()->gte($closing_time)){
            $student1 = Students::where(['qr_code'=>$request->get('qr_code')])->first();

            $student = User::where(['id'=>$student1->user_id])->with(['student'])->first();

            $scans = new Scans();
            $scans->staff_id = Auth::user()->id;
            $scans->student_id = $student1->id;
            $scans->save();

            return Response::json(array('status' => 'success','student' => $student));

        }else{
            return Response::json(array('status' => 'error','message' => 'Sorry its not yet school hours.not opened'));
        }

    }



    //block
    public function blockUser(Request $request){
        $closing_time = Carbon::now()->startOfDay()->addHour(19);
        $opening_time = Carbon::now()->startOfDay()->addHour(7);
        $check_if_closed = Carbon::now()->diffInMinutes($closing_time, false);
        $check_if_opened = Carbon::now()->diffInMinutes($opening_time, false);

        //validation
        $validator = Validator::make($request->all(), [
            'qr_code'=>'required|exists:students,qr_code',
            'description'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all(), 'status' => 400], 200);
        }


        if(Carbon::now()->gte($opening_time) && !Carbon::now()->gte($closing_time)){
            $student1 = Students::where(['qr_code'=>$request->get('qr_code')])->first();

            $student = User::where(['id'=>$student1->user->id])->with(['student'])->first();

            $blockings = new Blockings();
            $blockings->staff_id = Auth::user()->id;
            $blockings->student_id = $student1->id;
            $blockings->description = $request->get('description');
            $blockings->save();

            if($blockings->save()){
              //  $user = User::where(['id_number'=>$request->get('id_number')])->first();
                $student->status = 0;
                $student->save();
            }

            return Response::json(array('status' => 'success','message' => 'Student has been Blocked'));

        }else{
            return Response::json(array('status' => 'error','message' => 'Sorry its not yet school hours.not opened'));
        }


    }


    public function myBlockedCards(){
        $blockings = User::with(['blockings' => function($query){
            $query->orderBy('created_at','desc')->get();
        } ])->where('status',0)->get();

        //$blockings = Students::with('blockings')->get();
        return Response::json(array('status' => 'success','blocked_users' => $blockings));
    }


    public function getAuthenticatedUser()
    {
        $user = Auth::user();
        return Response::json(array('status' => 'success','user' => $user));
    }




}
