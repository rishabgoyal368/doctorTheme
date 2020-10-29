@extends('user.layout.app')
@section('content')
<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Welcome to {{env('APP_NAME')}}</h1>
            <ul>
                <li><a href="#">Home</a></li>
                <li>Assigned Caretakers</li>
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
                    <h2>Assigned Caretakers</h2>

                    <div class="table-responsive">
                        <table id="" class="table-bordered" style="min-width: 100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Profile Image</th>
                                    <!-- <th>Care taker type</th> -->
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($report as $value)
                                <tr>
                                    <td>{{$value->getCare()['name']}}</td>
                                    <td>{{$value->getCare()['email']}}</td>
                                    <td>{{$value->getCare()['mobile']}}</td>                                    
                                    <td><img src="{{$value->getCare()->getProfile()}}" alt="" width='35'></td>
                                    <!-- <td>{{$value->getCare()['type'] == '1' ? 'Doctor' : 'Care Taker'}}</td> -->
                                    <td>{{$value->status()}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6"  style="text-align: center;">No data Found</td>
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