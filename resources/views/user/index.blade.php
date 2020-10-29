@extends('user.layout.app')
@section('content')
<style>
    .image img {
        width: 100%;
        height: 15em;
    }
</style>
<!-- Start Home Slides Area -->
<section class="home-slides owl-carousel owl-theme">
    <div class="single-banner-item">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-12">
                            <div class="banner-content">
                                <!-- <span class="sub-title">New Arrivals</span> -->
                                <h1>Elderly Healthcare <span style="font-size:32px"><br>Take care of your health with us.</span></h1>
                                
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-12">
                            <div class="banner-image text-center">
                                <img src="assets/img/mainbanner.jpg" class="main-image" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="single-banner-item">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-12">
                            <div class="banner-content">
                                <h1>Safety Glasses Protective <span>Glove</span></h1>
                                <p>Our glasses and protective gloves are very important for personal safety.</p>
                                <div class="btn-box">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="default-btn"><i class="flaticon-trolley"></i> Add To Cart</a>
                                        <span class="price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-12">
                            <div class="banner-image text-center">
                                <img src="assets/img/banner/banner-img2.png" class="main-image" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <div class="single-banner-item">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-12">
                            <div class="banner-content">
                                <span class="sub-title">New Arrivals</span>
                                <h1>Protective Surgical <span>Mask</span></h1>
                                <p>Surgical masks can protect ourselves from various germs. Everyone should use this surgical mask.</p>
                                <div class="btn-box">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="default-btn"><i class="flaticon-trolley"></i> Add To Cart</a>
                                        <span class="price">$30.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-12">
                            <div class="banner-image text-center">
                                <img src="assets/img/banner/banner-img3.png" class="main-image" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</section>
<!-- End Home Slides Area -->

<!-- Start Banner Categories Area -->

<!-- End Banner Categories Area -->

<!-- Start Categories Area -->

<!-- End Categories Area -->

<!-- Start Products Area -->
<section class="products-area pb-40" id="who_we_are">
    <div class="container">
        <div class="section-title">
            <br><br>
            <h2>Who we are</h2>
        </div>

        <div class="row">
    <div class="col-sm-3">
                                <img src="assets/img/mainbanner.jpg" class="main-image" alt="image">
    </div>

<div class="col-sm-9">
    <p style="font-size:20px">Elderly Healthcare provides health care solutions for old aged people who face difficulties in doing their daily chores. It is a one stop solution for satisfying elderly people’s medical needs by tracking their medical conditions. Doctors and caretakers can see the updates for their assigned user’s medical records to help them maintain their health. Using this website, you or any of your elder can get aware of meet-up sessions uploaded for their community gatherings.</p>
    </div>

        </div>
    </div>
</section>
<section class="products-area pb-40" id="what_we_do">
    <div class="container">
        <div class="section-title">
            <br><br>
            <h2>What we do</h2>
        </div>

        <div class="row">
    <div class="col-sm-3">
                                <img src="assets/img/mainbanner.jpg" class="main-image" alt="image">
    </div>

<div class="col-sm-9">
    <p style="font-size:20px">Here in Elderly Healthcare, we provide many services and facilities which can be helpful for old aged people. <br>
•   User’s assigned caretakers can view their medical history and give them medications accordingly. <br>
•   Users can upload their daily health updates like blood pressure, sugar level, Nutrition level etc. on the website which can be seen by their assigned Doctor and Caretaker. <br>
•   Users can upload their medical history so that Caretakers and Doctors can easily understand their medical conditions. <br>
•   Users can have book meeting online with doctors to discuss their health concerns.
</p>
    </div>

        </div>
    </div>
</section>
<!-- End Products Area -->
@if(Auth::guard('user')->check())
<section class="categories-area pb-40" id="employee">
    <div class="container">
        <div class="section-title">
            <h2>Caretakers</h2>
        </div>

        <div class="row">
            @foreach($careTaker as $taker)
            <div class="col-lg-2 col-sm-4 col-md-4">
                <div class="single-categories-box">
                    <img src="{{$taker->getProfile()}}" alt="image">
                    <h3>{{$taker->name}}</h3>
                    <a href="{{url('book-care-taker')}}/{{$taker->id}}">Book now</a>                   
                </div>
            </div>
            @endforeach
            <div class="col-lg-2 col-sm-4 col-md-4">
                <a href="{{url('/care-takers')}}" class="btn btn-primary" style="position: relative;top: 11em;align-items: center;left: 10px;">show more</a>
            </div>
        </div>
    </div>
</section>
 @endif
<!-- Start Products Area -->
<section class="products-area pb-40" id="products">
    <div class="container">
        <div class="section-title">
            <h2>Products</h2>
        </div>

        <div class="row">
            @foreach($product as $pro)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-products-box">
                    <div class="image">
                        <a class="d-block"><img src="{{$pro->productImage()}}" alt="image"></a>

                        <div class="buttons-list">
                            <ul>
                                <li>
                                    {{$pro->description}}
                                </li>
                                <li>
                                    <div class="cart-btn">
                                        <a href="{{url('/product-order')}}/{{$pro->id}}">
                                            <i class='bx bxs-cart-add'></i>
                                            <span class="tooltip-label">Order</span>
                                        </a>
                                    </div>
                                </li>
                                <!-- <li>
                                    <div class="wishlist-btn">
                                        <a href="#">
                                            <i class='bx bx-heart'></i>
                                            <span class="tooltip-label">Add to Wishlist</span>
                                        </a>
                                    </div>
                                </li>-->
                                <li>
                                    <div class="quick-view-btn quick_view" data-id="{{$pro->id}}" > 
                                        <a>
                                            <i class='bx bx-search-alt'></i>
                                            <span class="tooltip-label" >Quick View</span>
                                        </a>
                                    </div>
                                </li> 
                            </ul>
                        </div>
                    </div>

                    <div class="content">
                        <h3><a>{{$pro->name}}</a></h3>
                        <div class="price">
                            <span class="new-price">${{$pro->price}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-lg-2 col-sm-4 col-md-4">
                <a href="{{url('/products')}}" class="btn btn-primary" style="position: relative;top: 11em;align-items: center;left: 10px;">show more</a>
            </div>
            <!-- <a href="{{url('products')}}">show more</a> -->
        </div>
    </div>
</section>
<!-- End Products Area -->




@endsection