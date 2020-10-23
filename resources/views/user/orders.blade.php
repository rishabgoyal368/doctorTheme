@extends('user.layout.app')
@section('content')
<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Welcome to Drodo</h1>
            <ul>
                <li><a href="#">Home</a></li>
                <li>Your Orders</li>
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
                    <h2>Your Orders</h2>

                    <div class="table-responsive">
                        <table id="" class="table-bordered" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>product id</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $value)
                                <tr>
                                    <td>{{$value['product_id']}}</td>
                                    <td>${{@$value['price']}}</td>                                   
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