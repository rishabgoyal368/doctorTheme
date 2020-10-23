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
                        <h4 class="card-title">Change Password</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="{{Request::url()}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Password
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" name="currentPassword" placeholder="Enter current password..." required>
                                                @if ($errors->has('currentPassword'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('currentPassword') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Password
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Choose a safe one.." required>
                                                @if ($errors->has('password'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Confirm Password <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="val-confirm-password" name="password_confirmation" placeholder="..and confirm it!">
                                                @if ($errors->has('password_confirmation'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn mr-2 btn-primary">Submit</button>
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
@endsection