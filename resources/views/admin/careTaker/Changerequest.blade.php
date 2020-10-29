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
                            <form class="form-valide" action="{{url('admin/change-care-taker-request')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{@$request->id}}">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-name">Status</label>
                                            <div class="col-lg-6">
                                                <select name="status" required id="">
                                                    <option value="" selected>Select Status</option>
                                                    <option value="1" @if($request->status == 1) selected @endif>Approve</option>
                                                    <option value="2" @if($request->status == 2) selected @endif>Reject</option>
                                                </select>
                                                @if ($errors->has('status'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('status') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn mr-2 btn-primary">Submit</button>
                                    <a href="{{url('admin/care-taker-request')}}" class="btn btn-light">cancel</a>
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