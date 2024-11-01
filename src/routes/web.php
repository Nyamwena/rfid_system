<?php

use App\Http\Controllers\AccessLogController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HealthcarePractitionerController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth']);

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth']);
Route::resource('patients', PatientController::class);
Route::resource('medical-records', MedicalRecordController::class);
Route::resource('healthcare-practitioners', HealthcarePractitionerController::class);
Route::resource('access-logs', AccessLogController::class);
Route::resource('appointments', AppointmentController::class);
Route::prefix('doctor')->name('doctor.')->group(function(){
    Route::get('/create',[HealthcarePractitionerController::class,'index'])->name('create');
    Route::post('/store',[HealthcarePractitionerController::class,'store'])->name('store');
});
Route::post('/patients/{id}/assign-rfid', [PatientController::class, 'assignRfidTag'])->name('patients.assignRfid');
Route::prefix('patient')->name('patient.')->group(function(){
        Route::get('/assign_tag/view/{id}',[PatientController::class,'assign_tage_view'])->name('assign_tag_vw');
        Route::get('/assign_tag/update/{rfid_tag}',[PatientController::class,'assignRfidTag'])->name('assign_tag');
});
