@extends('layouts.app')

@section('content')
    <div class="col-lg-12 col-12">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Edit Patience Details</h4>
            </div>
            <!-- /.box-header -->
            <form class="form" method="post" action="{{ route('patient.update_details', $patient->id) }}">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Personal Info</h4>
                    <hr class="my-15">
                    <div class="row">
                        <!-- Title -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <select class="form-select" name="title" required>
                                    <option value="Mr" {{ $patient->title == 'Mr' ? 'selected' : '' }}>Mr</option>
                                    <option value="Mrs" {{ $patient->title == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                                    <option value="Miss" {{ $patient->title == 'Miss' ? 'selected' : '' }}>Miss</option>
                                </select>
                            </div>
                        </div>
                        <!-- First Name and Last Name -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" value="{{ $patient->first_name }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="{{ $patient->last_name }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- ID Number and Date of Birth -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">ID Number</label>
                                <input type="text" class="form-control" name="id_number" value="{{ $patient->id_number }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="dob" value="{{ $patient->dob }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Gender and Marital Status -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Gender</label>
                                <input type="text" class="form-control" name="sex" value="{{ $patient->sex }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Marital Status</label>
                            <select class="form-select" name="marital_status" required>
                                <option value="Single" {{ $patient->marital_status == 'Single' ? 'selected' : '' }}>Single</option>
                                <option value="Married" {{ $patient->marital_status == 'Married' ? 'selected' : '' }}>Married</option>
                                <option value="Divorced" {{ $patient->marital_status == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                            </select>
                        </div>
                    </div>

                    <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i> Contact Details</h4>
                    <hr class="my-15">

                    <div class="row">
                        <!-- Mobile Number, Email Address, and Home Address -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" name="mobile_number" value="{{ $patient->mobile_number }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input type="text" class="form-control" name="email" value="{{ $patient->email }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Home Address</label>
                                <input type="text" class="form-control" name="home_address" value="{{ $patient->home_address }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Next of Kin Details -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Next of Kin Name</label>
                                <input type="text" class="form-control" name="next_of_keen_name" value="{{ $patient->next_of_keen_name }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Next of Kin Surname</label>
                                <input type="text" class="form-control" name="nx_of_keen_lname" value="{{ $patient->nx_of_keen_lname }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Next of Kin Relation</label>
                                <input type="text" class="form-control" name="nx_of_keen_rel" value="{{ $patient->nx_of_keen_rel }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Next of Kin Phone Number and Address -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Next of Kin Phone Number</label>
                                <input type="text" class="form-control" name="nx_of_keen_phone" value="{{ $patient->nx_of_keen_phone }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Next of Kin Address</label>
                                <input type="text" class="form-control" name="nx_of_keen_address" value="{{ $patient->nx_of_keen_address }}" required>
                            </div>
                        </div>
                    </div>
                </div>

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
