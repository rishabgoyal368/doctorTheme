@extends('admin.layouts.app')
@section('content')


<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <!-- <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Validation</a></li>
                </ol>
            </div>
        </div> -->
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="{{Request::url()}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-name">Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="name" placeholder="Enter your name.." required value="{{$user['name']}}">
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
                                                <input type="text" class="form-control" id="val-email" readonly name="email" placeholder="Your valid email.." value="{{@$user['email']}}">
                                                @if ($errors->has('email'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>                                       

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Profile Image
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="file" class="form-control" name="profile_image" @if(!@$user['profile_image']) required  @endif>
                                                @if ($errors->has('profile_image'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('profile_image') }}</strong>
                                                </div>
                                                @endif
                                                @if($user->profile_image)
                                                <a href="{{$user->getProfile()}}" target="_blank">Your profile image</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn mr-2 btn-primary">Submit</button>
                                    <!-- <button type="submit" class="btn btn-light">cencel</button> -->
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