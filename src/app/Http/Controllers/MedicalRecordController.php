<?php

namespace App\Http\Controllers;

use App\Events\RfidTagMatched;
use App\Models\ActivePatient;
use App\Models\Doctor;
use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function view_patients()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('patients.details_doc', compact('patients','doctors'));
    }


    public function medical_record_vw($patient_id)
    {
        try {
            $patient = Patient::where(['id'=> $patient_id])->first();
            return view('patients.medical_record', compact('patient'));

        }catch (Exception $exception){
            return redirect()->back()->with('toast_error',  $exception->getMessage() . '  Something Went Wrong!!!!');
        }

    }

    public function save_medical_record(Request $request)
    {
        try {

            $patient_id = $request->input('patient_id');
            $record_type = $request->input('record_type');
            $description = $request->input('description');
            $bmi = $request->input('bmi');
            $systolic = $request->input('bp_systolic');
            $diastolic = $request->input('bp_diastolic');
            $height = $request->input('height');
            $weight = $request->input('weight');

            MedicalRecord::create(['doctor_id'=>1,'record_type'=>$record_type,
                  'description'=>$description,
                  'patient_id'=>$patient_id,
                  'status'=>'New Patient', 'bmi'=>$bmi,'bp_systolic'=>$systolic,
                  'bp_diastolic'=>$diastolic,'height'=>$height,'weight'=>$weight]);
            return redirect()->back()->with('success', 'Patients medical record created successfully.');
        }catch (\Exception $e){
                dd($e->getMessage());
        }
    }
    public function edit_medical($id)
    {

        $patient = Patient::findOrFail($id);
        $medicalRecord =MedicalRecord::where(['patient_id'=>$id])->first();
        if($medicalRecord == null){
            return redirect()->back()->with('toast_warning','No medical record has been added for this patient');
        }
       // dd($medicalRecord);
        return view('patients.edit_medical', compact('patient','medicalRecord'));
    }
    public function update_medical_record(Request $request, $id)
    {
        try {
            // Retrieve the medical record by ID
            $medicalRecord = MedicalRecord::findOrFail($id);

            // Update fields from the form data
            $medicalRecord->update([
                'record_type' => $request->input('record_type'),
                'description' => $request->input('description'),
                'bmi' => $request->input('bmi'),
                'bp_systolic' => $request->input('bp_systolic'),
                'bp_diastolic' => $request->input('bp_diastolic'),
                'height' => $request->input('height'),
                'weight' => $request->input('weight'),
                'status' => 'Updated Record',
            ]);

            // Redirect with success message
            return redirect()->back()->with('success', 'Patient medical record updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('toast_error', 'Failed to update the medical record: ' . $e->getMessage());
        }
    }

    public function view_medical_record($id, $rfid_tag =null){
        try {
            if($rfid_tag == null){
                DB::table('active_patient')->truncate(); // Clear previous entries
                DB::table('active_patient')->insert([
                    'patient_id' => $id,
                    'status' => 1
                ]);
                $patient = Patient::where(['id'=>$id])->first();
            }else{
                $patient = Patient::with('medical_record')->where(['id'=>$id,'rfid_tag'=>$rfid_tag])->first();
            }

            return view('patients.vw_medical_record',compact('patient'));
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', 'Failed to update the medical record: ' . $exception->getMessage());
        }
    }



    public function checkRfid($rfid_tag)
    {
        $activePatient = ActivePatient::where('status', 1)->first();

        if ($activePatient) {
            $patient = Patient::where('id', $activePatient->patient_id)
                ->where('rfid_tag', $rfid_tag)
                ->first();

            if ($patient) {
                broadcast(new RfidTagMatched($patient));
                return response()->json(['success' => true, 'patient' => $patient]);
            }
        }

        return response()->json(['success' => false]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
