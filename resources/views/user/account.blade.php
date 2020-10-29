@extends('user.layout.app')
@section('content')
<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Welcome to {{env('APP_NAME')}}</h1>
            <ul>
                <li><a href="#">Home</a></li>
                <li>Profile Update</li>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title Area -->
<!-- Start Profile Authentication Area -->
<section class="profile-authentication-area ptb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="register-form">

                    <form class="form-valide" action="{{url('my-account')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{@$patient->id}}">
                        <div class="row">

                            <div class="col-xl-12">
                                <h2>Basic Profile</h2>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-name">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="name" placeholder="Enter your name.." required value="{{@$patient->name ?: old('name')}}">
                                        @if ($errors->has('name'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="email" placeholder="Your valid email.." value="{{@$patient->email ?: old('email')}}" required>
                                        @if ($errors->has('email'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Gender <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select name="gender" id="">
                                            <option value="" selected>Select Gender</option>
                                            <option value="male" @if(@$patient->gender == 'male') selected @endif >Male</option>
                                            <option value="female" @if(@$patient->gender == 'female') selected @endif >Female</option>
                                            <option value="other" @if(@$patient->gender == 'other') selected @endif>Others</option>
                                        </select>
                                        @if ($errors->has('email'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Life Story </label>
                                    <div class="col-lg-6">
                                        <textarea name="life_story" class="form-control" id="" cols="30" rows="10">{{@$patient->description}}</textarea>
                                        @if ($errors->has('life_story'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('life_story') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Mobile <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control" name="mobile" placeholder="Your Mobile number.." value="{{@$patient->mobile ?: old('mobile')}}" required>
                                        @if ($errors->has('mobile'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">DOB <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="date" class="form-control" id="val-email" name="dob" placeholder="Your dob" value="{{@$patient->dob}}">
                                        @if ($errors->has('dob'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('dob') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Age </label>
                                    <div class="col-lg-6">
                                        <input type="text" readonly class="form-control" id="val-email" name="age" placeholder="Your Age" value="{{$patient->age}}">
                                        @if ($errors->has('dob'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('dob') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Address <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea name="address" class="form-control" cols="30" rows="10" placeholder="Address">{{@$patient->address}}</textarea>
                                        @if ($errors->has('address'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Profile Image</label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" name="profile_image" value="{{old('profile_image')}}" accept="image/x-png,image/jpeg" @if(!@$patient->profile_image) required @endif>
                                        @if($patient->profile_image)
                                        <a href="{{$patient->getProfile()}}" target="_blank">your profile image ({{$patient->profile_image}})</a>
                                        @endif
                                        @if ($errors->has('profile_image'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('profile_image') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <h2>Emergency Contact Details</h2>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Contact Name <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="emergency_name" value="{{$patient->emergency_name}}" accept="image/x-png,image/jpeg">
                                        @if ($errors->has('emergency_name'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('emergency_name') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Contact Number <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="emergency_contact" value="{{@$patient->emergency_contact}}" accept="image/x-png,image/jpeg">
                                        @if ($errors->has('emergency_contact'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('emergency_contact') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Relation <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" name="emergency_relation" id="" class="form-control" value="{{@$patient->emergency_relation}}">
                                        @if ($errors->has('emergency_relation'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('emergency_relation') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <h2>Medical Record</h2>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Height <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="height" placeholder="Your Height" value="{{@$patient->height ?: old('height')}}" required>
                                        @if ($errors->has('height'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('height') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Weight <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="weight" placeholder="Your Weight" value="{{@$patient->weight ?: old('weight')}}" required>
                                        @if ($errors->has('weight'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('weight') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Current Health Concern (if any)
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="current_health_concern" placeholder="Your Current Health Concern" value="{{@$patient->current_health_concern ?: old('current_health_concern')}}" >
                                        @if ($errors->has('current_health_concern'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('current_health_concern') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Current Medication (if any) 
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="current_medication" placeholder="Your Current Medication" value="{{@$patient->current_medication ?: old('current_medication')}}" >
                                        @if ($errors->has('current_medication'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('current_medication') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Allergies (if any) 
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="alergy" placeholder="Your allergies" value="{{@$patient->alergy ?: old('alergy')}}" >
                                        @if ($errors->has('alergy'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('alergy') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Report File (if any) 
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" name="report_file" placeholder="Your Report File" value="{{@$patient->report_file ?: old('report_file')}}" @if(!@$patient->report_file)
                                         @endif>
                                        @if($patient->report_file)
                                        <a href="{{$patient->getReport()}}" target="_blank">your report file ({{$patient->report_file}})</a>
                                        @endif
                                        @if ($errors->has('report_file'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('report_file') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>


                            </div>
                            <button type="submit" class="btn mr-2 btn-primary">Submit</button>
                            <!-- <a href="{{url('admin/patients')}}" class="btn btn-light">cancel</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Profile Authentication Area -->


@endsection