@extends('layouts.app')

@section('content')
    <div class="col-lg-12 col-12">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add Users</h4>
            </div>
            <!-- /.box-header -->
            <form class="form" method="post" action="{{route('admin.create')}}">
                @csrf
                <div class="box-body">
{{--                    <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Personal Info</h4>--}}
                    <hr class="my-15">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" placeholder="Full Name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input type="text" class="form-control" placeholder="Email Address" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">ID Number</label>
                                <input type="text" class="form-control" placeholder="ID Number" name="national_id_number" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <label class="form-label">Role</label>
                            <select class="form-select" name="roles" required>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
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
