<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;
    protected $table ='tbl_medical_record';
    protected $fillable = [
      'patient_id','doctor_id','record_type','description','status',
        'ward','check_in_date','check_out_date','bmi','height','weight',
        'bp_systolic','bp_diastolic'
    ];

    public function doctor()
    {
        return $this->hasOne(Doctor::class,'id','doctor_id');
    }
}
