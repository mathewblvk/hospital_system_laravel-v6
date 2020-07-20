@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-md"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Doctors</span>
                            <span class="info-box-number">
                  10
                </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-id-card"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">General Staff</span>
                            <span class="info-box-number">40</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-briefcase-medical"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pharmacists</span>
                            <span class="info-box-number">0</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-injured"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">InPatients</span>
                            <span class="info-box-number">2</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-3">
                    <div class="card col-md-12">
                        <div class="card-header">
                            <h5 class="card-title">Reports</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body list-group">
                                    @if(Auth::user()->user_type == 'doctor' || Auth::user()->user_type == 'admin')
                                        <a href="#" class="list-group-item mt-4 list-group-item-action btn btn-success">Statistics</a>
                                    @endif

                                    @if(Auth::user()->user_type =='doctor' || Auth::user()->user_type == 'admin')
                                        <a href="#" class="list-group-item mt-4 list-group-item-action btn btn-danger">Monthly Reports</a>
                                    @endif

                                    <a href="#" class="btn btn-warning list-group-item-action list-group-item mt-4">
                                        Attendance Report
                                    </a>
                                    @if(Auth::user()->user_type !== 'pharmacist')
                                        <a href="#" class="btn btn-info mt-4 list-group-item list-group-item-action">Clinic Reports</a>
                                    @endif
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.card -->
                <div class="col-md-9">
                    <div class="card col-md-12 ">
                        <div class="card-header with-border">
                            <h5 class="card-title">Quick Links</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body col-sm-12">
                            <div class="row">
                                    @if(Auth::user()->user_type !== 'pharmacist')
                                        <div class="col-sm-3">
                                            <a href="#" class="btn btn-outline-dark">
                                                <i class="fas fa-user-plus"></i>Register Out-Patient</a>
                                        </div>
                                        <div class="col-sm-3">
                                            <a href="#" class="btn btn-outline-dark">
                                                <i class="fas fa-user-check"></i>Search Patients</a>
                                        </div>
                                        <div class="col-ms-3">
                                            <a href="#" class="btn btn-outline-dark">
                                                <i class="fas fa-wheelchair"></i>Register In-Patient</a>
                                        </div>
                                        @if(Auth::user()->user_type !== 'general')
                                        <div class="col-sm-3">
                                            <a href="#" class="btn btn-outline-dark">
                                                <i class="fa fa-heartbeat"></i>Check Patients</a>
                                        </div>
                                        @endif
                                    @endauth
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
    </section>
@endsection
