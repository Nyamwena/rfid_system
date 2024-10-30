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
        Schema::create('tbl_healthcare_practitioner', function (Blueprint $table) {
            $table->id();
            $table->string('rfid_tag')->unique()->nullable();
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('id_number');
            $table->string('staff_number')->nullable();
            $table->date('dob');
            $table->string('sex');
            $table->string('marital_status');
            $table->string('mobile_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('healthcare_practitioners');
    }
};
