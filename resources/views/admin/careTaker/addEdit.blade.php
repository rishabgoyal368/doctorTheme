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
                        <h4 class="card-title">{{@$label}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="{{url('admin/add-care-taker')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{@$patient->id}}">
                                <div class="row">
                                    <div class="col-xl-12">
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
                                                @if ($errors->has('gender'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('gender') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        @if(!isset($patient['id']))
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Password <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" name="password" placeholder="Your Password.." value="{{old('password')}}" required>
                                                @if ($errors->has('password'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        @endif
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
                                            <label class="col-lg-4 col-form-label" for="val-email">Type <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select name="type" id="">
                                                    <option value="">Select Type</option>
                                                    <option value="1" @if(@$patient->type == '1') selected @endif>Doctor</option>
                                                    <option value="2" @if(@$patient->type == '2') selected @endif>Care taker</option>
                                                </select>
                                                @if ($errors->has('type'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('type') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Profile Image</label>
                                            <div class="col-lg-6">
                                                <input type="file" class="form-control" name="profile_image" value="{{old('profile_image')}}" accept="image/x-png,image/jpeg">
                                                @if ($errors->has('profile_image'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('profile_image') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn mr-2 btn-primary">Submit</button>
                                    <a href="{{url('admin/care-takers')}}" class="btn btn-light">cancel</a>
                                </div>
                            </form>
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