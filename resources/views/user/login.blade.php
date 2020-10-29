@extends('user.layout.app')
@section('content')
<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Welcome to {{env('APP_NAME')}}</h1>
            <ul>
                <li><a href="/">Home</a></li>
                <li>Login/Register</li>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title Area -->

<!-- Start Profile Authentication Area -->
<section class="profile-authentication-area ptb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="login-form">
                    <h2>Login</h2>

                    <form method="POST" action="{{url('/login')}}">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email" required>
                            @if ($errors->has('email'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            @if ($errors->has('password'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                            @endif
                        </div>

                       <!--  <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6 col-sm-6 remember-me-wrap">
                                <p>
                                    <input type="checkbox" id="test2">
                                    <label for="test2">Remember me</label>
                                </p>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 lost-your-password-wrap">
                                <a href="#" class="lost-your-password">Lost your password?</a>
                            </div>
                        </div> -->

                        <button type="submit">Log In</button>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="register-form">
                    <h2>Register</h2>

                    <form method="POST" action="{{url('/register')}}">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" style="width:100%">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <button type="submit">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Profile Authentication Area -->

<!-- Start Facility Area -->
<section class="facility-area bg-f7f8fa pt-70 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-md-3 col-6">
                <div class="single-facility-box">
                    <div class="icon">
                        <i class="flaticon-free-shipping"></i>
                    </div>
                    <h3>Free Shipping</h3>
                    <p>Free shipping world wide</p>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-3 col-6">
                <div class="single-facility-box">
                    <div class="icon">
                        <i class="flaticon-headset"></i>
                    </div>
                    <h3>Support 24/7</h3>
                    <p>Contact us 24 hours a day</p>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-3 col-6">
                <div class="single-facility-box">
                    <div class="icon">
                        <i class="flaticon-secure-payment"></i>
                    </div>
                    <h3>Secure Payments</h3>
                    <p>100% payment protection</p>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-3 col-6">
                <div class="single-facility-box">
                    <div class="icon">
                        <i class="flaticon-return-box"></i>
                    </div>
                    <h3>Easy Return</h3>
                    <p>Simple returns policy</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Facility Area -->
@endsection