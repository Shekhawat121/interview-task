<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorAvalilablitySlot extends Model
{
    use HasFactory;
    protected $guarded =[]; 
    public function getAppontment()
    {
        return $this->hasOne('App\Models\Appointment' , 'slots_id' , 'id');
    }
}
