<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded =[]; 

    public function getDoctorAppointment()
    {
        return $this->hasMany('App\Models\DoctorAvalilablitySlot' , 'id' , 'slots_id');
    }

}
