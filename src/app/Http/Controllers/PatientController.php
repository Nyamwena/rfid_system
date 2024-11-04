<?php

namespace App\Http\Controllers;

use App\Models\ActivePatient;
use App\Models\Doctor;
use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('patients.index', compact('patients','doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('patients.details', compact('patients','doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $doctor_id = $request->input('doctor_id');
            $record_type = $request->input('record_type');
            $description = $request->input('description');
            $bmi = $request->input('bmi');
            $systolic = $request->input('bp_systolic');
            $diastolic = $request->input('bp_diastolic');
            $height = $request->input('height');
            $weight = $request->input('weight');

          $patient =  Patient::create($request->except(['_token']));
          if($patient){
              MedicalRecord::create(['doctor_id'=>$doctor_id,'record_type'=>$record_type,
                  'description'=>$description,
                  'patient_id'=>$patient->id,
                  'status'=>'New Patient', 'bmi'=>$bmi,'bp_systolic'=>$systolic,
                  'bp_diastolic'=>$diastolic,'height'=>$height,'weight'=>$weight]);
          }
            return redirect()->back()->with('toast_success', 'Patient created successfully.');
        }catch (\Exception $exception){
                dd($exception->getMessage());
        }
    }

    public function assign_tage_view(Request $request, $patient_id_encry)
    {
        try {
          $decrypted_id = decrypt($patient_id_encry);
              $request->session()->put('patient_id',$decrypted_id);
           //   dd($request->session()->get('patient_id'));
            DB::table('active_patient')->truncate();
            $active_patient = ActivePatient::create(['patient_id'=>$decrypted_id,'status'=>1]);
          $patient = Patient::where(['id'=>$decrypted_id])->has('medical_record')->first();
         // dd($patient->medical_record->doctor->first_name);
          return view('patients.assign_tag',compact('patient'));
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }
    }

    public function assignRfidTag(Request $request, $rfid_tag)
    {
        try {
            $patient_id = ActivePatient::where(['status'=>1])->first()->patient_id;
              // Get patient_id from session

            if ($patient_id) {
                Patient::where('id', $patient_id)->update(['rfid_tag' => $rfid_tag]);
                return response()->json(['message' => "RFID tag assigned successfully to patient $patient_id"], 200);
            } else {
                return response()->json(['error' => 'Patient ID not found in session'], 400);
            }
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
