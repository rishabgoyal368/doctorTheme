@extends('user.layout.app')
@section('content')

<section class="products-area ptb-70">
    <div class="container">
        <div class="drodo-grid-sorting row align-items-center">
            <div class="col-lg-6 col-md-6 result-count">
                <p>We found <span class="count">{{count($careTaker)}}</span> care takers for you</p>
                <!-- <span class="sub-title"><a href="#" data-toggle="modal" data-target="#productsFilterModal"><i class='bx bx-filter-alt'></i> Filter</a></span> -->
            </div>
        </div>

        <div class="row">
            @foreach($careTaker as $taker )
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="single-products-box">
                    <div class="image">
                        <a href="#" class="d-block"><img src="{{$taker->getProfile()}}" alt="image"></a>

                        <div class="buttons-list">
                            <ul>
                                <li>
                                    <div style="background:rgba(0,0,0,0.4)">
                                        <p style="color:white"><b>Name :- </b> {{$taker->name}}</p>
                                        <p style="color:white"><b>Email :- </b> {{$taker->email}}</p>
                                        <p style="color:white"><b>Gender :- </b> {{$taker->gender}}</p>
                                        <p style="color:white"><b>Mobile :- </b> {{$taker->mobile}}</p>
                                    </div>
                                </li>
                                <li>
                                    @if(Auth::guard('user')->check())
                                    <div class="cart-btn">
                                        <a href="{{url('book-care-taker')}}/{{$taker->id}}">
                                            <i class='bx bxs-cart-add'></i>
                                            <span class="tooltip-label">book now</span>
                                        </a>
                                    </div>
                                    @endif
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="content">
                        <h3><a href="#">{{$taker->name}}</a></h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>




@endsection