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