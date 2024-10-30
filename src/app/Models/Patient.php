<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'tbl_patient';

    protected $fillable = [
        'rfid_tag', 'title', 'first_name', 'last_name', 'middle_name', 'id_number',
        'patient_number', 'dob', 'sex', 'marital_status', 'mobile_number', 'home_address',
        'email', 'next_of_keen_name', 'nx_of_keen_lname', 'nx_of_keen_phone', 'nx_of_keen_rel',
        'nx_of_keen_address',
    ];

    public function medical_record()
    {
        return $this->hasOne(MedicalRecord::class,'patient_id','id');
    }


}
