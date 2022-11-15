<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\{User,Appointment,DoctorAvalilablitySlot};
class AppintmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            if(Auth::User()->hasRole('doctor')){
                return redirect()->back()->with('message' , 'something went wrong');
            }
            $doctor = User::role('doctor')->get();
            return view('users.create' , compact('doctor'));
            
        } catch (Exception $e) {
            return redirect()->back()->with('message' , 'something went wrong');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $data = $request->all();
            $this->validate($request, [
                'doctor_id'=> ['required', 'integer'],
                'slot_id' => ['required'],
            ]);
            Appointment::create(['user_id' => Auth::User()->id , 'slots_id' => $request->slot_id]);
            return redirect('home');
            
        } catch (Exception $e) {
            return redirect()->back()->with('message' , 'something went wrong');
        }

    }


    public function getAppontment(Request $request)
    {
        try {
            // dd($request->id);
            $apppointment = DoctorAvalilablitySlot::where(['user_id' => $request->id])->get();
            return response()->json(['status' => 'succes' , 'data' => $apppointment]);
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('message' , 'something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
