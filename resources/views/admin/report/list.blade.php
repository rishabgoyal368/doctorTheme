@extends('admin.layouts.app')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->


        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-11">
                            <div class="card-header">
                                <h4 class="card-title">User Report list</h4>
                            </div>
                        </div>
                        <div class="col-1">
                            <!-- <a href="{{url('admin/add-patient')}}" class="btn btn-primary shadow btn-xs sharp mr-1" style="margin-top:25px"><i class="fa fa-plus"></i></a> -->
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Created At</th>
                                        <th>Username</th>
                                        <th>BP Level</th>
                                        <th>Sugar Level</th>
                                        <th>Body Temperature</th>
                                        <th>Breakfast</th>
                                        <th>Lunch</th>
                                        <th>Dinner</th>
                                        <th>Activities</th>                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($report as $value)
                                    <tr>
                                        <td>{{@$value['created_at'] ? date('d-M-Y',strtotime($value['created_at'])) : '--'}}</td>
                                        <td>user name</td>
                                        <td>{{$value['bp']}}</td>
                                        <td>{{@$value['sugar']}}</td>
                                        <td>{{$value['temperature']}}</td>
                                        <td>{{$value['breakfast']}}</td>
                                        <td>{{$value['lunch']}}</td>
                                        <td>{{$value['dinner']}}</td>
                                        <td>{{$value['activities']}}</td>
                                        <td>
                                            <div class="d-flex">
                                                @if(Auth::guard('admin')->check())
                                                <a href="{{url('admin/edit-patient-report')}}/{{$value['id']}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                                                @elseif(Auth::guard('cakerTaker')->check())
                                                <a href="{{url('employee/edit-patient-report')}}/{{$value['id']}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                                                @endif
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
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->

@endsection