<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivePatient extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'active_patient';
    protected $fillable = ['patient_id','status'];
}
