<?php

namespace App\Http\Controllers;

use App\Models\ActivePatient;
use App\Models\Doctor;
use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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


            do {
                $patient_number = substr(time(), -5) . Str::random(3);
            } while (Patient::where('patient_number', $patient_number)->exists());

            $patient = Patient::create(array_merge(
                $request->except(['_token']),
                ['patient_number' => $patient_number]
            ));
            return redirect()->back()->with('success', 'Patient created successfully.');
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error',  $exception->getMessage() . '  Something Went Wrong!!!!');
        }
    }



    public function assign_tage_view(Request $request, $patient_id_encry)
    {
        try {
          $decrypted_id = decrypt($patient_id_encry);
              $request->session()->put('patient_id',$decrypted_id);
             // dd($decrypted_id);
           //   dd($request->session()->get('patient_id'));
            DB::table('active_patient')->truncate();
            $active_patient = ActivePatient::create(['patient_id'=>$decrypted_id,'status'=>1]);
          $patient = Patient::with('medical_record')->where(['id'=>$decrypted_id])->first();
          //dd($patient);
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

    public function edit_patient($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    public function update_patient(Request $request, $id)
    {
        try {
            $patient = Patient::findOrFail($id);
            $patient->update($request->except(['_token', '_method']));
            return redirect()->back()->with('success', 'Patient details updated successfully.');
        } catch (\Exception $exception) {
            return redirect()->back()->with('toast_error', $exception->getMessage() . '  Something Went Wrong!!!!');
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
