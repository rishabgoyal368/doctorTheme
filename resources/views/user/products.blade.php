@extends('user.layout.app')
@section('content')

<section class="products-area ptb-70">
    <div class="container">
        <div class="drodo-grid-sorting row align-items-center">
            <div class="col-lg-6 col-md-6 result-count">
                <p>We found <span class="count">{{count($product)}}</span> products for you</p>
                <!-- <span class="sub-title"><a href="#" data-toggle="modal" data-target="#productsFilterModal"><i class='bx bx-filter-alt'></i> Filter</a></span> -->
            </div>
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
                                <li>
                                    <div class="quick-view-btn quick_view" data-id="{{$pro->id}}">
                                        <a>
                                            <i class='bx bx-search-alt'></i>
                                            <span class="tooltip-label">Quick View</span>
                                        </a>
                                    </div>
                                </li>
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
            <a href="{{url('products')}}">show more</a>
        </div>
    </div>
</section>




@endsection