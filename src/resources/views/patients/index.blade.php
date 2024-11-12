@extends('layouts.app')

@section('content')
    <div class="col-lg-12 col-12">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add Patience Details</h4>
            </div>
            <!-- /.box-header -->
            <form class="form" method="post" action="{{route('patients.store')}}">
                @csrf
                <div class="box-body">
                    <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Personal Info</h4>
                    <hr class="my-15">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <select class="form-select" name="title" required>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" placeholder="First Name" name="first_name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">ID Number</label>
                                <input type="text" class="form-control" placeholder="ID Number" name="id_number" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" placeholder="date of birth" name="dob" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Gender</label>
                                <input type="text" class="form-control" placeholder="Gender" name="sex" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Marital Status</label>
                            <select class="form-select" name="marital_status" required>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                            </select>
                        </div>
                    </div>


                    <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i> Contact Details</h4>
                    <hr class="my-15">
                    <div class="row">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control" placeholder="Mobile Number" name="mobile_number" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Email Address</label>
                                    <input type="text" class="form-control" placeholder="Email Address" name="email" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Home Address</label>
                                    <input type="text" class="form-control" placeholder="Home Address" name="home_address" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Next of Keen Name</label>
                                    <input type="text" class="form-control" placeholder="next_of_keen_name" name="next_of_keen_name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Next of Keen Surname</label>
                                    <input type="text" class="form-control" placeholder="nx_of_keen_lname" name="nx_of_keen_lname"  required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Next of Keen Relation</label>
                                    <input type="text" class="form-control" placeholder="nx_of_keen_rel" name="nx_of_keen_rel" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Next of Keen Phone Number</label>
                                    <input type="text" class="form-control" placeholder="nx_of_keen_phone" name="nx_of_keen_phone" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Next of Keen Address</label>
                                    <input type="text" class="form-control" placeholder="nx_of_keen_address" name="nx_of_keen_address"  required>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="button" class="btn btn-warning me-1">
                        <i class="ti-trash"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="ti-save-alt"></i> Save
                    </button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>

@endsection
