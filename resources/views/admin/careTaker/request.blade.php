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
                                <h4 class="card-title">Caretakers List</h4>
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
                                        <th>Patient</th>
                                        <th>Caretaker</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($request as $value)
                                    <tr>
                                        <td>{{$value->getUser()}}</td>
                                        <td>{{@$value->getCareUser()}}</td>
                                        <td>{{$value->status()}}</td>
                                        <td>{{@$value['created_at'] ? date('d-M-y',strtotime($value['created_at'])) : '--'}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{url('admin/change-care-taker-request')}}/{{$value['id']}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
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