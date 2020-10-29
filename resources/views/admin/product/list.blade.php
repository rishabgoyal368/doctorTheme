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
                                <h4 class="card-title">Products list</h4>
                            </div>
                        </div>
                        <div class="col-1">
                            <a href="{{url('admin/add-product')}}" class="btn btn-primary shadow btn-xs sharp mr-1" style="margin-top:25px"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>

                    <div class="card-body">
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
                                        <td>{{@$value['status']}}</td>
                                        <td>{{@$value->getType()}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{url('admin/edit-product')}}/{{$value['id']}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
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