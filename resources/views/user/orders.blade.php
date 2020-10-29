@extends('user.layout.app')
@section('content')
<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Welcome to {{env('APP_NAME')}}</h1>
            <ul>
                <li><a href="#">Home</a></li>
                <li>Order History</li>
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
                    <h2>Order History</h2>

                    <div class="table-responsive">
                        <table id="" class="table-bordered" style="min-width:100%">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product rent available</th>
                                    <th>Price</th>
                                    <th>Ordered Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $value)
                                <tr>
                                    <td>{{$value->getProductName()}}</td>
                                    <td>
                                        {{$value['date_from'] ? 'Yes' : 'No'}} <br>
                                        {{$value['date_from']}}
                                    </td>
                                    <td>${{@$value['price']}}</td>
                                    <td>{{@$value['created_at'] ? date('d-M-Y h:i:s A',strtotime($value['created_at'])) : '--'}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" style="text-align: center;">No Data Found</td>
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