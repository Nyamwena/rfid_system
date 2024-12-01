<?php

use App\Http\Controllers\MedicalRecordController;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('medicals/check-rfid/{rfid_tag}', [MedicalRecordController::class, 'checkRfid'])->name('check.rfid');

Route::get('/check-session', function () {
    //Log::info('Session Check:', ['patient_id' => session('patient_id')]);
    if ($patientId = Cache::get('active_patient')) {
        $patient = Patient::find($patientId);
        return response()->json(['success' => true, 'patient' => $patient]);
    }else{
        return response()->json(['success' => false]);
    }



});
