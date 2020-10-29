@extends('admin.layouts.app')
@section('content')


<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View user</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                           
                             <div class="row">

                            <div class="col-xl-12">
                                <h2>Basic Profile</h2>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-name">Name
                                        
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
                                    <label class="col-lg-4 col-form-label" for="val-email">Email 
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
                                    <label class="col-lg-4 col-form-label" for="val-email">Gender 
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
                                    <label class="col-lg-4 col-form-label" for="val-email">Life story </label>
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
                                    <label class="col-lg-4 col-form-label" for="val-email">Mobile 
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
                                    <label class="col-lg-4 col-form-label" for="val-email">DOB 
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
                                    <label class="col-lg-4 col-form-label" for="val-email">Address 
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
                                        
                                        @if($patient->profile_image)
                                        <a href="{{$patient->getProfile()}}" target="_blank">profile image ({{$patient->profile_image}})</a>
                                        @endif
                                        
                                    </div>
                                </div>
                                <h2>Emergency Details</h2>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">name 
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
                                    <label class="col-lg-4 col-form-label" for="val-email">contact 
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
                                    <label class="col-lg-4 col-form-label" for="val-email">relation 
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
                                    <label class="col-lg-4 col-form-label" for="val-email">height 
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="height" placeholder="Your Height.." value="{{@$patient->height ?: old('height')}}" required>
                                        @if ($errors->has('height'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('height') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">weight 
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="weight" placeholder="Your weight.." value="{{@$patient->weight ?: old('weight')}}" required>
                                        @if ($errors->has('weight'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('weight') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">current health concern 
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="current_health_concern" placeholder="Your current_health_concern.." value="{{@$patient->current_health_concern ?: old('current_health_concern')}}" required>
                                        @if ($errors->has('current_health_concern'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('current_health_concern') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">current medication 
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="current_medication" placeholder="Your current_medication.." value="{{@$patient->current_medication ?: old('current_medication')}}" required>
                                        @if ($errors->has('current_medication'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('current_medication') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">alergy 
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="alergy" placeholder="Your alergy.." value="{{@$patient->alergy ?: old('alergy')}}" required>
                                        @if ($errors->has('alergy'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('alergy') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">report_file 
                                    </label>
                                    <div class="col-lg-6">
                                        @if($patient->report_file)
                                        <a href="{{$patient->getReport()}}" target="_blank">report file ({{$patient->report_file}})</a>
                                        @endif
                                        
                                    </div>
                                </div>


                            </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->



<!--**********************************
        Main wrapper end
    ***********************************-->
@endsection