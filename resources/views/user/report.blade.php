@extends('user.layout.app')
@section('content')
<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Welcome to Drodo</h1>
            <ul>
                <li><a href="#">Home</a></li>
                <li>Profile update</li>
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
                    <h2>Reports <a href="{{url('add-report')}}">Add Reports</a></h2>

                    <div class="table-responsive">
                        <table id="" class="table-bordered" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>bp</th>
                                    <th>sugar</th>
                                    <th>temperature</th>
                                    <th>brewakfast</th>
                                    <th>lunch</th>
                                    <th>dinner</th>
                                    <th>activiyies</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($report as $value)
                                <tr>
                                    <td>{{$value['bp']}}</td>
                                    <td>{{@$value['sugar']}}</td>
                                    <td>{{$value['temperature']}}</td>
                                    <td>{{$value['brewakfast']}}</td>
                                    <td>{{$value['lunch']}}</td>
                                    <td>{{$value['dinner']}}</td>
                                    <td>{{$value['activiyies']}}</td>                                   
                                    <td>{{@$value['created_at'] ? date('d-M-Y h:i:s A',strtotime($value['created_at'])) : '--'}}</td>
                                    <td>{{@$value['created_at'] ? date('d-M-Y h:i:s A',strtotime($value['updated_at'])) : '--'}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{url('edit-report')}}/{{$value['id']}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
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