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
        Schema::create('tbl_patient', function (Blueprint $table) {
            $table->id();
            $table->string('rfid_tag')->unique();
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('id_number');
            $table->string('patient_number');
            $table->date('dob');
            $table->string('sex');
            $table->string('marital_status');
            $table->string('mobile_number');
            $table->string('home_address');
            $table->string('email');
            $table->string('next_of_keen_name');
            $table->string('nx_of_keen_lname');
            $table->string('nx_of_keen_phone');
            $table->string('nx_of_keen_rel');
            $table->string('nx_of_keen_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
