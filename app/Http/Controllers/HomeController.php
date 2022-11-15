<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{DoctorAvalilablitySlot,User,Appointment};
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            $userId = isset(Auth::User()->id) ? Auth::User()->id : '';
            if (Auth::User()->hasRole('doctor')) {
                $doctor = DoctorAvalilablitySlot::where(['user_id'    =>  $userId])->paginate(10);
                return view('doctor_slots.index' , compact('doctor'));
            }
            $appoinntment  = Appointment::where(['user_id' => $userId])->with('getDoctorAppointment')->get();
            return view('users.index' , compact('appoinntment'));
        } catch (Exception $e) {
            return redirect()->back()->with('message' , 'something went wrong');
        }

    }

}
