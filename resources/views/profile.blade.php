@extends('layouts.admin')

@section('content')

    <?php
$user = Auth::user();
$name = ucfirst($user->name);
$user_type =$user->user_type;
$image_path =$user->img_path;
$email = $user->email;
$tp = $user->contactnumber;
$id = $user->id;
?>


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hello {{$name}}</h1> <small>You can change your profile settings here.</small>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{$image_path}}"
                                         alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{$name}}</h3>

                                <p class="text-muted text-center">{{$user_type}}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>ID</b> <a class="float-right">{{$id}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{$email}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Contact Number</b> <a class="float-right">{{$tp}}</a>
                                    </li>
                                </ul>

                                <a href="#" class="btn btn-primary btn-block"><b>Edit profile</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                <p class="text-muted">
                                    {{Auth::user()->education}}
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                <p class="text-muted">{{Auth::user()->location}}</p>

                                <hr>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Update Acccount info</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#changePassword" data-toggle="tab">Change Password</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#contactnumber" data-toggle="tab">Change contact number</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#profilePicture" data-toggle="tab">Change profile picture</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <div class="card" style="">
                                            <div class="card-header">
                                                <h3 class="card-title">Update Account info</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <form method="post" action="{{route('edit_profile')}}">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="name">{{__('Name Of The Staff')}} <span class="text-red">*</span></label>
                                                        <input id="name" type="text" class="form-control " name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="email">{{__('Email Address')}} <span class="text-red">*</span></label>
                                                        <input required id="email" type="email" class="form-control " name="email" value="{{Auth::user()->email}}" required autocomplete="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="education">{{__('Education')}} <span class="text-red">*</span></label>
                                                        <input required id="email" type="text" class="form-control " name="education" value="{{Auth::user()->education}}" required autocomplete="education">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="education">{{__('Location')}} <span class="text-red">*</span></label>
                                                        <input required id="location" type="text" class="form-control " name="location" value="{{Auth::user()->location}}" required autocomplete="location">
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="changePassword">
                                        <!-- The timeline -->
                                        <div class="card" style="">
                                            <div class="card-header">
                                                <h3 class="card-title">Change Password</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <form method="post" action="{{route('edit_password')}}">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="name">{{__('Current Password')}} <span class="text-red">*</span></label>
                                                        <input  type="password" class="form-control " name="current_password" required autocomplete="name" autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">{{__('New Password')}} <span class="text-red">*</span></label>
                                                        <input type="password" class="form-control " name="new_password" required >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="education">{{__('Repeat Password')}} <span class="text-red">*</span></label>
                                                        <input  type="password" class="form-control " name="repeat_password" required autocomplete="education">
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="contactnumber">
                                        <div class="card" style="">
                                            <div class="card-header">
                                                <h3 class="card-title">Update Contact number</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <form method="post" action="{{route('edit_contact_number')}}">
                                                @csrf
                                                <div class="card-body">
                                                    <p class="text-red">In case you don't have current contact number, fill <b>new contact number</b> and submit.</p>
                                                    <div class="form-group">
                                                        <label>{{__('Current Contact Number')}}</label>
                                                        <input type="text" class="form-control" value="{{Auth::user()->contactnumber}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="contactnumber">{{__('New contact number')}} <span class="text-red">*</span></label>
                                                        <input required type="text" class="form-control" name="contactnumber" placeholder="+255...">
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    <button type="reset" class="btn btn-default">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="profilePicture">
                                        <form action="{{route('change_profile_picture')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <p class="help-block">select your new profile picture here.</p>
                                                    <input type="file" id="exampleInputFile" name="profile_picture"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <!-- /.box-body -->

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
@endsection
