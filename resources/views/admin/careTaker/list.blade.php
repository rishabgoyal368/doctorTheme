@extends('admin.layouts.app')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>Datatable</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-11">
                            <div class="card-header">
                                <h4 class="card-title">Patient list</h4>
                            </div>
                        </div>
                        <div class="col-1">
                            <a href="{{url('admin/add-care-taker')}}" class="btn btn-primary shadow btn-xs sharp mr-1" style="margin-top:25px"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Profile Image</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
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
                                                <a href="{{url('admin/edit-patient')}}/{{$value['id']}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
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
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->

@endsection