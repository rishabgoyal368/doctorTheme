@extends('user.layout.app')
@section('content')
<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Welcome to {{env('APP_NAME')}}</h1>
            <ul>
                <li><a href="#">Home</a></li>
                <li>Products</li>
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
                    <div class="row">
                        <div class="col-sm-10">
                            <h2>Your Products </h2>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{url('add-product')}}">Add Product</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>price</th>
                                    <th>image</th>
                                    <th>status</th>
                                    <th>rent available</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($product as $value)
                                <tr>
                                    <td>{{$value['name']}}</td>
                                    <td>{{@$value['price']}}</td>
                                    <td><img class="rounded-circle" width="35" src="{{$value->productImage()}}" alt=""></td>
                                    <td>{{@$value->getStatus()}}</td>
                                    <td>{{@$value->getType()}}</td>
                                    <td>
                                        <a href="{{url('edit-product')}}/{{$value['id']}}" class="btn btn-primary shadow btn-xs sharp mr-1">edit</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">No data Found</td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Profile Authentication Area -->


@endsection