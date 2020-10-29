@extends('user.layout.app')
@section('content')
<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Welcome to {{env('APP_NAME')}}</h1>
            <ul>
                <li><a href="#">Home</a></li>
                <li>Daily Report</li>
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
                <h2>Daily Reports </h2>
                </div>
                <div class="col-sm-2">
                <a href="{{url('add-report')}}">Add Reports</a>
                    </div>
                </div>

                    <div class="table-responsive">
                        <table id="" class="table-bordered" style="min-width: 100%">
                            <thead>
                                <tr>
                                    <th>BP level</th>
                                    <th>Sugar Level</th>
                                    <th>Body Temperature</th>
                                    <th>Breakfast Done</th>
                                    <th>Lunch Done</th>
                                    <th>Dinner Done</th>
                                    <th>Activities Done</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($report as $value)
                                <tr>
                                    <td>{{$value['bp']}}</td>
                                    <td>{{@$value['sugar']}}</td>
                                    <td>{{$value['temperature']}}</td>
                                    <td>{{$value['breakfast']}}</td>
                                    <td>{{$value['lunch']}}</td>
                                    <td>{{$value['dinner']}}</td>
                                    <td>{{$value['activities']}}</td>                                   
                                    <td>{{@$value['created_at'] ? date('d-M-Y h:i:s A',strtotime($value['created_at'])) : '--'}}</td>
                                    <td>{{@$value['created_at'] ? date('d-M-Y h:i:s A',strtotime($value['updated_at'])) : '--'}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{url('edit-report')}}/{{$value['id']}}" class="btn btn-primary shadow btn-xs sharp mr-1">Edit</a>
                                            <!-- <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a> -->
                                        </div>
                                    </td>
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