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
                            <form class="form-valide" action="{{url('admin/add-product')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{@$product->id}}">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-name">Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="name" placeholder="Enter your name.." required value="{{@$product->name ?: old('name')}}">
                                                @if ($errors->has('name'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-name">Price
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="price" placeholder="Enter price.." required value="{{@$product->price ?: old('price')}}">
                                                @if ($errors->has('price'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('price') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Status <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select name="status" id="">
                                                    <option value="" selected>Select Status</option>
                                                    <option value="active" @if(@$product->status == 'active') selected @endif >active</option>
                                                    <option value="deactivate" @if(@$product->status == 'deactivate') selected @endif >deactivate</option>
                                                    <option value="delete" @if(@$product->status == 'delete') selected @endif>delete</option>
                                                </select>
                                                @if ($errors->has('status'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('status') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-type">is rent available <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select name="type" id="">
                                                    <option value="" selected>Select available</option>
                                                    <option value="1" @if(@$product->type == '1') selected @endif >Yes</option>
                                                    <option value="2" @if(@$product->type == '2') selected @endif >No</option>
                                                </select>
                                                @if ($errors->has('type'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('type') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-name">Description
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea name="description" class="form-control" id="" cols="30" rows="10">
                                                {{@$product->description ?: old('description')}}
                                                </textarea>
                                                <!-- <input type="text" class="form-control" name="name" placeholder="Enter your name.." required value="{{@$product->name ?: old('name')}}"> -->
                                                @if ($errors->has('name'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Image</label>
                                            <div class="col-lg-6">
                                                <input type="file" class="form-control" name="image" value="" accept="image/x-png,image/jpeg">
                                                @if ($errors->has('image'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn mr-2 btn-primary">Submit</button>
                                    <a href="{{url('admin/products')}}" class="btn btn-light">cancel</a>
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