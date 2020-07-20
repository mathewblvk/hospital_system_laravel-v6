
@extends('layouts.app2')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-70 p-b-90" style="padding: 30px 30px">
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form flex-sb flex-w">
                    @csrf
					<span class="login100-form-title p-b-51">
						Smart Hospital
					</span>


                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
                        <input class="input100" type="email" name="email" placeholder="Email Address">
                        <span class="focus-input100"></span>
                    </div>


                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-24">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="#" class="txt1">
                                Forgot?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn m-t-17">
                        <button class="login100-form-btn" type="submit">
                            {{__('Login')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection







