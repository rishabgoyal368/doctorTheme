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
                                <span class="sub-title">New Arrivals</span>
                                <h1>Triton Grip Nitrile <span>Gloves</span></h1>
                                <p>Gloves protect our hands from a variety of things. Nitrile gloves are comfortable to wear.</p>
                                <div class="btn-box">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="default-btn"><i class="flaticon-trolley"></i> Add To Cart</a>
                                        <span class="price">$50.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-12">
                            <div class="banner-image text-center">
                                <img src="assets/img/banner/banner-img1.png" class="main-image" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-banner-item">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-12">
                            <div class="banner-content">
                                <span class="sub-title">New Arrivals</span>
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
    </div>

    <div class="single-banner-item">
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
    </div>
</section>
<!-- End Home Slides Area -->

<!-- Start Banner Categories Area -->
<!-- <section class="banner-categories-area pt-70 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="single-banner-categories-box">
                    <img src="assets/img/banner-categories/banner-categories-img1.jpg" alt="image">

                    <div class="content">
                        <span class="sub-title">Temperature</span>
                        <h3><a href="#">Ear Thermometers</a></h3>
                        <div class="btn-box">
                            <div class="d-flex align-items-center">
                                <a href="products-left-sidebar.html" class="default-btn"><i class="flaticon-trolley"></i> Shop Now</a>
                                <span class="price">$49.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="single-banner-categories-box">
                    <img src="assets/img/banner-categories/banner-categories-img2.jpg" alt="image">

                    <div class="content">
                        <span class="sub-title">Personal</span>
                        <h3><a href="#">Favorite Collection</a></h3>
                        <div class="btn-box">
                            <div class="d-flex align-items-center">
                                <a href="products-left-sidebar.html" class="default-btn"><i class="flaticon-trolley"></i> Shop Now</a>
                                <span class="price">$69.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- End Banner Categories Area -->

<!-- Start Categories Area -->
<section class="categories-area pb-40">
    <div class="container">
        <div class="section-title">
            <h2>Care Takers</h2>
        </div>

        <div class="row">
            @foreach($careTaker as $taker)
            <div class="col-lg-2 col-sm-4 col-md-4">
                <div class="single-categories-box">
                    <img src="{{$taker->getProfile()}}" alt="image">
                    <h3>{{$taker->name}}</h3>
                    @if(Auth::guard('user')->check())
                    <a href="{{url('book-care-taker')}}/{{$taker->id}}">Book now</a>
                    @endif
                </div>
            </div>
            @endforeach
            <div class="col-lg-2 col-sm-4 col-md-4">
                <a href="{{url('/care-takers')}}" class="btn btn-primary" style="position: relative;top: 11em;align-items: center;left: 10px;">show more</a>
            </div>
        </div>
    </div>
</section>
<!-- End Categories Area -->

<!-- Start Products Area -->
<section class="products-area pb-40">
    <div class="container">
        <div class="section-title">
            <h2>Products</h2>
        </div>

        <div class="row">
            @foreach($product as $pro)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-products-box">
                    <div class="image">
                        <a href="single-products-1.html" class="d-block"><img src="{{$pro->productImage()}}" alt="image"></a>

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
                                </li>
                                <li>
                                    <div class="quick-view-btn">
                                        <a href="#" data-toggle="modal" data-target="#productsQuickView">
                                            <i class='bx bx-search-alt'></i>
                                            <span class="tooltip-label">Quick View</span>
                                        </a>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                    </div>

                    <div class="content">
                        <h3><a href="single-products-1.html">{{$pro->name}}</a></h3>
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