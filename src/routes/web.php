<?php

use App\Http\Controllers\AccessLogController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HealthcarePractitionerController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserManagementController;
use App\Http\Middleware\MedicalPractitionerAccess;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth']);

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth']);
Route::resource('patients', PatientController::class)->middleware(['auth','auth.isDataCapture']);
Route::resource('medical-records', MedicalRecordController::class);
Route::resource('healthcare-practitioners', HealthcarePractitionerController::class);
Route::resource('access-logs', AccessLogController::class);
Route::resource('appointments', AppointmentController::class);
Route::prefix('doctor')->name('doctor.')->middleware(['auth','auth.isAdmin'])->group(function(){
    Route::get('/create',[HealthcarePractitionerController::class,'index'])->name('create');
    Route::post('/store',[HealthcarePractitionerController::class,'store'])->name('store');
});
Route::post('/patients/{id}/assign-rfid', [PatientController::class, 'assignRfidTag'])->name('patients.assignRfid');
Route::prefix('patient')->name('patient.')->group(function(){
        Route::get('/assign_tag/view/{id}',[PatientController::class,'assign_tage_view'])->name('assign_tag_vw');
        Route::get('/assign_tag/update/{rfid_tag}',[PatientController::class,'assignRfidTag'])->name('assign_tag');
        Route::get('patients/{id}/edit', [PatientController::class, 'edit_patient'])->name('edit_details');
        Route::put('patients/{id}/update', [PatientController::class, 'update_patient'])->name('update_details');

});


Route::prefix('usermanagement')->name('admin.')->group(function(){
    Route::get('/home',[UserManagementController::class,'user_view'])->name('view');
    Route::post('/create',[UserManagementController::class,'create_user'])->name('create');
});

Route::prefix('medicals')->name('medical.')->middleware(['auth','auth.isMedicalPractitioner'])->group(function (){
   Route::get('/patients',[MedicalRecordController::class,'view_patients'])->name('all');
   Route::get('/add_medical/{id}',[MedicalRecordController::class,'medical_record_vw'])->name('add_medical');
   Route::post('/save_medical',[MedicalRecordController::class,'save_medical_record'])->name('save');
   Route::get('/edit_medical/{id}/edit',[MedicalRecordController::class,'edit_medical'])->name('edit_medical');
    Route::put('/update_medical/{id}/update',[MedicalRecordController::class,'update_medical_record'])->name('update_medical');
    Route::get('/view_medical_records/{id}/{rfid_tag?}',[MedicalRecordController::class,'view_medical_record'])->name('records');


});



