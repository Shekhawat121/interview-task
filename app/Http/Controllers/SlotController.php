<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth,Validator;
use App\Models\{DoctorAvalilablitySlot};
class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            if(!Auth::User()->hasRole('doctor')){
                return redirect()->back()->with('message' , 'something went wrong');
            }
            return view('doctor_slots.create');
            
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
                'doctorId'=> ['required', 'integer'],
                'date' => ['required'],
                'start_time' => ['required'],
                'end_time' => ['required'],
                'start_time' => ['required'],
                'slot_duration' => ['required'],
            ]);
            $date1 = date('d-m-y' , strtotime($data['date']));
            $date = date('d-m-y');
            if ($date1 < $date) {
                return redirect()->back()->with('message' , 'please enter future date');
            }
            DoctorAvalilablitySlot::create(['user_id' => Auth::User()->id ,  'doctor_id' => $data['doctorId'] , 'date' => $data['date'] , 'start_time'   =>  $data['start_time'] , 'end_time' => $data['end_time'] , 'slot_duration' => $data['slot_duration']]);
            return redirect('home');
            
        } catch (Exception $e) {
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
