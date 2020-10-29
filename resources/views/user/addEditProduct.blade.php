@extends('user.layout.app')
@section('content')
<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Welcome to {{env('APP_NAME')}}</h1>
            <ul>
                <li><a href="#">Home</a></li>
                <li>Add report</li>
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
                    <h2>Report</h2>

                    <form class="form-valide" action="{{url('/add-product')}}" method="POST" enctype="multipart/form-data">
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
                                        <textarea name="description" class="form-control" id="" cols="30" rows="10" placeholder="Description">{{@$product->description ?: old('description')}}</textarea>
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
                            <a href="{{url('user-products')}}" class="btn btn-light">cancel</a>
                            <!-- <button type="submit" class="btn btn-light">cencel</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Profile Authentication Area -->


@endsection