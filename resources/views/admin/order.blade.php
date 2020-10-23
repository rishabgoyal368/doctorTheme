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
                                <h4 class="card-title">Order list</h4>
                            </div>
                        </div>                       
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>User</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($order as $value)
                                    <tr>
                                        <td><a href="{{url('admin/edit-product')}}/{{$value['product_id']}}">{{$value->getProductName()}}</a></td>
                                        <td><a href="{{url('admin/edit-patient')}}/{{$value['user_id']}}">{{@$value->getUserName()}}</a></td>
                                        <td>{{@$value['price']}}</td>
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