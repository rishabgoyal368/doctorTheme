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
                    <h2>Report</h2>

                    <form method="POST" action="{{url('/add-report')}}">
                        @csrf
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
                            <input type="text" class="form-control" name="breakfast" placeholder="Breakfast" value="{{@$report['brewakfast']}}">
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
                            <textarea name="activities" class="form-control" id="" cols="30" rows="10" placeholder="activities">{{@$report['activiyies']}}</textarea>
                        </div>
                        
                        

                        <p class="description">The password should be at least eight characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ & )</p>

                        <button type="submit">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Profile Authentication Area -->


@endsection