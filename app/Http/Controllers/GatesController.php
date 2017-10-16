<?php

namespace App\Http\Controllers;

use App\Gates;
use Illuminate\Http\Request;

use Redirect;
use Validator;

class GatesController extends Controller
{
    public function index()
    {
        $gates = Gates::get();
        return view('gates', ['gates' => $gates]);
    }

    public function getGate($gate_id){

        $gate = Gates::where(['id' => $gate_id])->first();

        if (!$gate) {
            abort(404);
        }
        return view('gate', ['gate' => $gate]);
    }

    public function addGatePost(Request $request){
        $rules = [
            'name' => 'required',
            'description' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $gate = new Gates();
        $gate->name = $request->input('name');
        $gate->description = $request->input('description');
        $gate->save();

        return redirect()->route('gates')->with('success','The Gate has been created successfully');
    }


    public function deleteGate($gate_id)
    {
        $gate = Gates::where(['id' => $gate_id])->first();
        if (!$gate) {
            abort(404);
        }

        try {
            $gate->delete();
        } catch (QueryException $e) {
            if ($e->getCode() == "23000") {
                return back()->withErrors('You cannot delete an item that is referenced somewhere else');
            }
        }

        return redirect()->route('gates')->with('success', 'Gate has been deleted Successfully');
    }

    public function updateGate(Request $request,$gate_id){
        $gate = Gates::where(['id' => $gate_id])->first();
        if (!$gate) {
            abort(404);
        }
        $rules = [
            'name' => 'required',
            'description' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $gate->name = $request->input('name');
        $gate->description = $request->input('description');
        $gate->save();
        return redirect()->route('gate',$gate_id)->with('success', 'Gate has been updated Successfully');
    }



}
