@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-8 col-12">
            <div class="d-md-flex align-items-center justify-content-between mb-20">
                <a href="javascript:void(0);" class="btn btn-primary me-5 mb-md-0 mb-5"><i class="fa fa-edit"></i> Edit Profile</a>
            </div>
            <div class="box">
                <div class="box-body text-end min-h-50" >
                </div>
                <div class="box-body wed-up position-relative">
                    <div class="d-md-flex align-items-center">

                        <div class="mt-40">
                            <h4 class="fw-600 mb-5">{{ $patient->first_name . ' '.  $patient->middle_name . ' '. $patient->last_name }} </h4>
                            <h5 class="fw-500 mb-5">Patient Number:  {{$patient->patient_number}}</h5>
                            <p><i class="fa fa-clock-o"></i> DOB:  {{$patient->dob}}</p>
                        </div>
                    </div>
                </div>
                <div class="box-body pt-0">
                    <h4>Story About Disease</h4>
                    <p>
                        {{$patient->medical_record->description}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-12">
                    <div class="box">
                        <div class="box-body box-profile">
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <p>Email :<span class="text-gray ps-10">{{$patient->email}}</span> </p>
                                        <p>Phone :<span class="text-gray ps-10">{{$patient->mobile_number}}</span></p>
                                        <p>Address :<span class="text-gray ps-10">{{$patient->home_address}}</span></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-4 col-12">
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title">Assigned Doctor</h4>
                </div>
                <div class="box-body">
                    <div class="d-flex align-items-center">
                        <img src="../images/avatar/avatar-10.png" class="w-100 bg-primary-light rounded10 me-15" alt="" />
                        <div>
                            <h4 class="mb-0">Dr.  {{$patient->medical_record->doctor->first_name }}   {{$patient->medical_record->doctor->last_name}}</h4>
                            <p class="text-muted">Physician</p>
                            <div class="d-flex">
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star-half"></i>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-15">
                        <a href="javascript:void(0);" class="btn btn-danger-light me-4">Unassign</a>
                        <a href="javascript:void(0);" class="btn btn-success-light ">Check</a>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title">Current Vitals</h4>
                    <div class="box-controls pull-right">
                        <div class="lookup lookup-circle lookup-right">
                            <input type="text" name="s" placeholder="Patients id">
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="flexbox bb-1 mb-15">
                        <div><p><span class="text-mute">Patient Name:</span> <strong>{{ $patient->first_name . ' '.  $patient->middle_name . ' '. $patient->last_name }}</strong></p></div>
                        <div><p><span class="text-mute">Patient Id:</span> <strong> {{$patient->patient_number}}</strong></p></div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row bb-1 pb-10">
                                <div class="col-4">
                                    <img class="img-fluid float-start w-30 mt-10 me-10" src="../images/weight.png" alt="">
                                    <div>
                                        <p class="mb-0"><small>Weight</small></p>
                                        <h5 class="mb-0"><strong>{{$patient->medical_record->weight . ' Kgs'}}</strong></h5>
                                    </div>
                                </div>
                                <div class="col-4 bs-1 be-1">
                                    <img class="img-fluid float-start w-30 mt-10 me-10" src="../images/human.png" alt="">
                                    <div>
                                        <p class="mb-0"><small>Height</small></p>
                                        <h5 class=" mb-0"><strong>{{$patient->medical_record->height . ' Meters'}}</strong></h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid float-start w-30 mt-10 me-10" src="../images/bmi.png" alt="">
                                    <div>
                                        <p class="mb-0"><small>BMI</small></p>
                                        <h5 class="mb-0"><strong>{{$patient->medical_record->bmi}}</strong></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-5">
                                <div class="col-12">
                                    <span class="text-danger">Blood Pressure</span>
                                </div>
                                <div class="col-6">
                                    <div class="progress progress-xs mb-0 mt-5 w-40">
                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                        </div>
                                    </div>
                                    <h2 class="float-start mt-0 mr-10"><strong>{{$patient->medical_record->bp_systolic}}</strong></h2>
                                    <div>
                                        <p class="mb-0"><small>Systolic</small></p>
                                        <p class="mb-0 mt-0"><small class="vertical-align-super">mmHg</small></p>
                                    </div>
                                </div>
                                <div class="col-6 bl-1">
                                    <div class="progress progress-xs mb-0 mt-5 w-40">
                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                        </div>
                                    </div>
                                    <h2 class="float-start mt-0 mr-10"><strong>{{$patient->medical_record->bp_diastolic}}</strong></h2>
                                    <div>
                                        <p class="mb-0"><small>Diastolic</small></p>
                                        <p class="mb-0 mt-0"><small class="vertical-align-super">mmHg</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body pt-0">
                    <p><small>Recorded on  {{$patient->created_at}}</small></p>
                </div>

            </div>


        </div>
    </div>



@endsection
