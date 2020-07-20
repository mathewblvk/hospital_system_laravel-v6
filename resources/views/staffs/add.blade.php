@extends('layouts.admin')

@section('content')


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Staff Registration</h1> <small>Register new staff here</small>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Add Staff</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container-fluid">
        <div class="col-md-1"></div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        {{session()->get('success')}}
                    </div>

                @endif
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="row">
            <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card" style="padding:10px;margin-top:4.5vh !important">
                        <div class="card-header">
                            <h3 class="card-title">Staff Registration form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{route('register_staff')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">{{__('Name Of The Staff')}} <span class="text-red">*</span></label>
                                    <input id="name" type="text" class="form-control "
                                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="email">{{__('Email Address')}} <span class="text-red">*</span></label>
                                    <input required id="email" type="email"
                                           class="form-control " name="email"
                                           value="{{ old('email') }}" required autocomplete="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">{{__('Password')}} <span class="text-red">*</span></label>
                                    <input required value="12345678" readonly id="password" type="password"
                                           class="form-control" name="password" required
                                           autocomplete="new-password">
                                    <span class="text-primary" role="alert">
                                        <strong>{{__('Default Password 12345678')}}</strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">{{__('Confirm Password')}} <span class="text-red">*</span></label>
                                    <input required readonly id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" value="12345678" required autocomplete="new-password">
                                </div>
                                <div class="form-group">
                                    <label for="user-type">{{ __('Role') }} <span class="text-red">*</span></label>
                                    <select required id="role_id" type="select" class="form-control" name="role_id">
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            <div class="col-md-1"></div>
        </div>
    </div>




@endsection
