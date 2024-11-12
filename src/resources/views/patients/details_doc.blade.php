@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="box">
            <div class="box-body">
                <div class="table-responsive rounded card-table">
                    <table class="table border-no" id="example1">
                        <thead>
                        <tr>
                            <th>Patient ID Number</th>
                            <th>Patient Name</th>
                            <th>Gender</th>
                            <th>Mobile Number</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $patients as $patient)
                        <tr class="hover-primary">

                                <td>{{$patient->id_number}}</td>
                                <td>{{$patient->first_name}} {{"  "}}  {{$patient->last_name}}</td>
                                <td>{{$patient->sex}}</td>
                                <td>{{$patient->mobile_number}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="hover-primary dropdown-toggle no-caret" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">View Medical Records</a>
                                            <a class="dropdown-item" href="{{route('medical.add_medical', $patient->id)}}">Add Medical Records</a>
                                            <a class="dropdown-item" href="{{route('medical.edit_medical', $patient->id)}}">Edit Medical Records</a>
                                        </div>
                                    </div>
                                </td>

                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal for RFID Tag assignment -->
        <div class="modal fade" id="assignRfidModal" tabindex="-1" aria-labelledby="assignRfidModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="assignRfidModalLabel">Assign RFID Tag</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" id="rfidTagInput" class="form-control" placeholder="Scan RFID Card">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="assignRfidBtn">Assign RFID</button>
                    </div>
                </div>
            </div>
        </div>


        @endsection

@section('js')
            <script>
                $(document).ready(function() {
                    $('.assign-rfid-btn').on('click', function() {
                        const patientId = $(this).data('id');
                        $('#assignRfidModal').modal('show');
                        $('#assignRfidModal').find('#assignRfidBtn').data('patient-id', patientId);
                    });

                    $('#assignRfidBtn').on('click', function() {
                        const patientId = $(this).data('patient-id');
                        const rfidTag = $('#rfidTagInput').val();

                        $.ajax({
                            url: `/patients/${patientId}/assign-rfid`,
                            method: 'POST',
                            data: {
                                rfid_tag: rfidTag,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                alert('RFID tag assigned successfully');
                                $('#assignRfidModal').modal('hide');
                            },
                            error: function(xhr) {
                                alert('Error: ' + xhr.responseJSON.message);
                            }
                        });
                    });
                });
            </script>

@endsection
