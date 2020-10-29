@extends('admin.layouts.app')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">


        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-11">
                            <div class="card-header">
                                <h4 class="card-title">User list</h4>
                            </div>
                        </div>
                        <div class="col-1">
                            <a href="{{url('admin/add-patient')}}" class="btn btn-primary shadow btn-xs sharp mr-1" style="margin-top:25px"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Profile Image</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($patient as $value)
                                    <tr>
                                        <td><img class="rounded-circle" width="35" src="{{$value->getProfile()}}" alt=""></td>
                                        <td>{{$value['name']}}</td>
                                        <td>{{@$value['gender']}}</td>
                                        <td>{{$value['email']}}</td>
                                        <!-- <td>{{$value['mobile']}}</td> -->
                                        <td><a href="javascript:void(0);"><strong>{{$value['mobile']}}</strong></a></td>
                                        <td>{{@$value['created_at'] ? date('d-M-y',strtotime($value['created_at'])) : '--'}}</td>
                                        <td>
                                            <div class="d-flex">
                                                @if(Auth::guard('admin')->check())
                                                <a href="{{url('admin/edit-patient')}}/{{$value['id']}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                @endif
                                                <a href="{{url('/view-user')}}/{{$value['id']}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                                                <!-- <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a> -->
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