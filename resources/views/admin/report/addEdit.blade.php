@extends('admin.layouts.app')
@section('content')


<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Validation</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{@$label}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <!-- <form method="POST" action="{{url('/add-report')}}">
                                @csrf -->
                                <input type="hidden" name="id" value="{{@$report->id}}">
                                <div class="form-group">
                                    <label>BP</label>
                                    <input type="text" class="form-control" name="bp" placeholder="BP" value="{{@$report['bp']}}">
                                </div>

                                <div class="form-group">
                                    <label>sugar</label>
                                    <input type="text" class="form-control" name="sugar" placeholder="sugar" value="{{@$report['sugar']}}">
                                </div>

                                <div class="form-group">
                                    <label>Temperature</label>
                                    <input type="text" class="form-control" name="temperature" placeholder="temperature" value="{{@$report['temperature']}}">
                                </div>

                                <div class="form-group">
                                    <label>Breakfast</label>
                                    <input type="text" class="form-control" name="breakfast" placeholder="Breakfast" value="{{@$report['breakfast']}}">
                                </div>

                                <div class="form-group">
                                    <label>lunch</label>
                                    <input type="text" class="form-control" name="lunch" placeholder="lunch" value="{{@$report['lunch']}}">
                                </div>

                                <div class="form-group">
                                    <label>dinner</label>
                                    <input type="text" class="form-control" name="dinner" placeholder="Dinner" value="{{@$report['dinner']}}">
                                </div>


                                <div class="form-group">
                                    <label>Activities</label>
                                    <textarea name="activities" class="form-control" id="" cols="30" rows="10" placeholder="activities">{{@$report['activities']}}</textarea>
                                </div>
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



<!--**********************************
        Main wrapper end
    ***********************************-->
@endsection