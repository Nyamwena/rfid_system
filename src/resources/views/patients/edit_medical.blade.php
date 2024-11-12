@extends('layouts.app')

@section('content')
    <div class="col-lg-12 col-12">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Edit Medical Record for  {{$patient->first_name}}  {{$patient->last_name}}</h4>
            </div>
            <!-- /.box-header -->

            <form class="form" method="post" action="{{ route('medical.update_medical', $medicalRecord->id) }}">
                @csrf
                @method('PUT')
                <input type="hidden" class="form-control" name="patient_id" value="{{ $medicalRecord->patient_id }}" required>

                <div class="box-body">
                    <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i> Edit Medical Record</h4>
                    <hr class="my-15">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Disease</label>
                                <input type="text" class="form-control" placeholder="description" name="description" value="{{ $medicalRecord->description }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Record Type</label>
                                <select class="form-select" name="record_type" required>
                                    <option value="Diagnosis" {{ $medicalRecord->record_type == 'Diagnosis' ? 'selected' : '' }}>Diagnosis</option>
                                    <option value="Treatment" {{ $medicalRecord->record_type == 'Treatment' ? 'selected' : '' }}>Treatment</option>
                                    <option value="Test Results" {{ $medicalRecord->record_type == 'Test Results' ? 'selected' : '' }}>Test Results</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">BMI</label>
                                <input type="number" class="form-control" placeholder="BMI" name="bmi" value="{{ $medicalRecord->bmi }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Blood Pressure (Systolic)</label>
                                <input type="number" class="form-control" placeholder="Systolic (mm Hg)" name="bp_systolic" value="{{ $medicalRecord->bp_systolic }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Blood Pressure (Diastolic)</label>
                                <input type="number" class="form-control" placeholder="Diastolic (mm Hg)" name="bp_diastolic" value="{{ $medicalRecord->bp_diastolic }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Height</label>
                                <input type="number" class="form-control" placeholder="Height" name="height" value="{{ $medicalRecord->height }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Weight</label>
                                <input type="number" class="form-control" placeholder="Weight" name="weight" value="{{ $medicalRecord->weight }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer with Save and Cancel buttons -->
                <div class="box-footer">
                    <button type="button" class="btn btn-warning me-1">
                        <i class="ti-trash"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="ti-save-alt"></i> Update
                    </button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>

@endsection
