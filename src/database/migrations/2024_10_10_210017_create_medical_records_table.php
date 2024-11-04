<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_medical_record', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('patient_id');
            $table->unsignedInteger('doctor_id');
            $table->string('record_type');
            $table->string('description');
            $table->string('status')->nullable();
            $table->string('ward')->nullable();
            $table->double('weight')->nullable();
            $table->double('height')->nullable();
            $table->double('bmi')->nullable();
            $table->double('bp_systolic')->nullable();
            $table->double('bp_diastolic')->nullable();
            $table->date('check_in_date')->nullable();
            $table->date('check_out_date')->nullable();

//            $table->double('weight')->nullable();
//            $table->double('height')->nullable();
//            $table->double('bmi')->nullable();
//            $table->double('bp_systolic')->nullable();
//            $table->double('bp_diastolic')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};
