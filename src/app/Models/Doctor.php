<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'tbl_healthcare_practitioner';
    protected $fillable = ['rfid_tag','title','first_name','middle_name','last_name'
        ,'id_number','staff_number','dob','sex','marital_status','mobile_number'
    ];
}
