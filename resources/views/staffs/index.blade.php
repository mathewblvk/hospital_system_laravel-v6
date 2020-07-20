@extends('layouts.admin')

@section('content')
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Hospital Staff List</h1> <small>Create, Edit, Update and delete staffs informations here</small>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active">Staff List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Hospital Staff List</h3>
                                    <a type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#addStaff" style="float: right"><i class="fas fa-plus-circle"></i>Add staff</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="staffList" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Staff Name</th>
                                            {{--                                    <th>Email</th>--}}
                                            <th>Staff Code</th>
                                            <th>Position</th>
                                            {{--                                    <th>Education</th>--}}
                                            {{--                                    <th>Location</th>--}}
                                            {{--                                    <th>Contact Number</th>--}}
                                            <th>Actions</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @if(count($staffs) > 0)
                                            @foreach($staffs as $staff)
                                                <tr>
                                                    <td><img src="{{asset("$staff->img_path")}}" class="profile-user-img" alt="User Image"></td>
                                                    <td>{{$staff->name}}</td>
                                                    <td>{{$staff->staff_code}}</td>
                                                    <td>{{$staff->role->name}}</td>
                                                    <td>
                                                        <a href="staff/{{$staff->id}}/edit" class="btn btn-default btn-sm" data-toggle="modal" data-target="#editStaff"><i class="fas fa-edit"></i>Edit</a>
                                                        <a class="btn btn-danger btn-sm"><i class="fas fa-window-close"></i>Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <th colspan="5" class="text-center"><----No registered staff----></th>
                                            </tr>
                                        @endif
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Image</th>
                                            <th>Staff Name</th>
                                            <th>Staff Code</th>
                                            <th>Position</th>
                                            <th>Actions</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="modal fade" id="addStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content col-md-12">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Staff registration form</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="addStaffForm">
                                        <div class="modal-body">
                                            @csrf
                                            <div class="form-group">
                                                <label>{{__('Name Of The Staff')}} <span class="text-red">*</span></label>
                                                <input  type="text" class="form-control " name="name" required  autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('Email Address')}} <span class="text-red">*</span></label>
                                                <input required id="email" type="email" class="form-control " name="email">
                                            </div>
                                            <div class="form-group">
                                                <label >{{__('Password')}} <span class="text-red">*</span></label>
                                                <input required value="12345678" readonly type="password" class="form-control" name="password">
                                                <span class="text-primary" role="alert">
                                        <strong>{{__('Default Password 12345678')}}</strong>
                                    </span>
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('Confirm Password')}} <span class="text-red">*</span></label>
                                                <input  readonly type="password" class="form-control" name="password_confirmation" value="12345678" required>
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('Role') }} <span class="text-red">*</span></label>
                                                <select required id="role_id" type="select" class="form-control" name="role_id">
                                                    @foreach ($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content col-md-12">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModal">Update staff information</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="editStaffForm">
                                        <div class="modal-body">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>{{__('Name Of The Staff')}}</label>
                                                        <input  type="text" class="form-control " name="name" required  value="{{$staff->name}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>{{__('Staff Code')}}</label>
                                                        <input  type="text" class="form-control " name="staff_code" required  value="{{$staff->staff_code}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>{{__('location')}} </label>
                                                        <input  type="text" class="form-control " name="location" required  value="{{$staff->location}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>{{__('Email Address')}}</label>
                                                        <input required type="text" class="form-control " name="email" value="{{$staff->email}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>{{__('Education')}}</label>
                                                        <input required type="text" class="form-control " name="education" value="{{$staff->education}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>{{__('Contact Number')}}</label>
                                                        <input required type="text" class="form-control " name="contact_number" value="{{$staff->contactnumber}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>{{__('Position')}}</label>
                                                        <input required type="text" class="form-control " name="position" value="{{$staff->role->name}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


@endsection

@section('optional_scripts')
    <script>
        $(function () {
            $("#staffList").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
        $(document).ready(function () {
            $('#addStaffForm').on('submit',function (e) {
                e.preventDefault();
                $.ajax({
                    type:'POST',
                    url:'register_staff',
                    data:$('#addStaffForm').serialize(),
                    success: function (success) {
                        console.log(success);
                        $('#addStaff').modal('hide');
                        alert('Data saved')
                    },
                    error: function (error) {
                        console.log(error);
                        alert('Error')
                    }
                })
            })
        })

    </script>
@endsection

