<!doctype html>
<html lang="zxx">

<!-- Mirrored from templates.envytheme.com/drodo/default/{{url('/')}} by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Oct 2020 14:35:22 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Links of CSS files -->
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/boxicons.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/nice-select.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/fancybox.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/rangeSlider.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/responsive.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{env('APP_NAME')}}</title>

    <link rel="icon" type="image/png" href="{{url('assets/img/logo.png')}}">
</head>

<body>

    <!-- Start Top Header Area -->
    <!-- End Top Header Area -->

    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <div class="drodo-responsive-nav">
            <div class="container">
                <div class="drodo-responsive-menu">
                    <div class="logo">

                        <a href="{{url('/')}}" class="logo d-inline-block"><img src="assets/img/logo.png" alt="image" style="width:150px;height:70px"></a>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="drodo-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">

                    <a href="{{url('/')}}" class="navbar-brand"><img src="assets/img/logo.png" alt="image" style="width:150px;height:70px"></a>
                    </a>

                    <div class="collapse navbar-collapse mean-menu">
                        <ul class="navbar-nav">


                            <li class="nav-item"><a href="{{url('/')}}" class="nav-link active">Home</a></li>
                            <li class="nav-item"><a href="{{url('/')}}#who_we_are" class="nav-link">Who we are</a></li>
                            <li class="nav-item"><a href="{{url('/')}}#what_we_do" class="nav-link">What we do</a></li>
                            <li class="nav-item"><a href="{{url('/products')}}" class="nav-link">Products</a></li>
                            @if(Auth::guard('user')->check())
                            <li class="nav-item"><a href="{{url('/care-takers')}}" class="nav-link">Caretakers</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">My Account <i class='bx bx-chevron-down'></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="{{url('/my-account')}}" class="nav-link">Profile</a></li>

                                    <li class="nav-item"><a href="{{url('/assign-care-taker')}}" class="nav-link">Caretaker</a></li>

                                    <li class="nav-item"><a href="{{url('/reports')}}" class="nav-link">Daily Report</a></li>

                                    <li class="nav-item"><a href="{{url('/order')}}" class="nav-link">Order History</a></li>

                                    <li class="nav-item"><a href="{{url('/user-products')}}" class="nav-link">Products</a></li>

                                    <li class="nav-item"><a href="{{url('/logout')}}" class="nav-link">Logout</a></li>
                                </ul>
                            </li>

                            @else
                            <li class="nav-item"><a href="{{url('/login')}}" class="nav-link">Login</a></li>
                            @endif
                        </ul>


                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->

    <!-- Start Search Overlay -->
    <div class="search-overlay">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>

                <div class="search-overlay-close">
                    <span class="search-overlay-close-line"></span>
                    <span class="search-overlay-close-line"></span>
                </div>

                <div class="search-overlay-form">
                    <form>
                        <input type="text" class="input-search" placeholder="Search here...">
                        <button type="submit"><i class='bx bx-search-alt'></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Search Overlay -->
    @include('admin.layouts.response')
    @yield('content')

    <!-- Start Footer Area -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-footer-widget">
                        <a href="#" class="logo d-inline-block"><img src="assets/img/logo.png" alt="image"></a>
                        <ul class="footer-contact-info">
                            <li><span>Hotline:</span> <a href="#">0413705763</a></li>
                            <li><span>Phone:</span> <a href="tel:+1234567898">(+61) 4231-79440</a></li>
                            <li><span>Email:</span> <a href="mailto:hello@drodo.com">hello@elderlyhealthcare.com</a></li>
                            <li><span>Address:</span> <a href="#" target="_blank">Victoria University, Ballarat Rd, Footscray VIC 3011, AUS</a></li>
                        </ul>
                        <!-- <ul class="social">
                            <li><a href="#" target="_blank"><i class='bx bxl-facebook-square'></i></a></li>
                            <li><a href="#" target="_blank"><i class="bx bxl-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class='bx bxl-instagram-alt'></i></a></li>
                            <li><a href="#" target="_blank"><i class='bx bxl-linkedin-square'></i></a></li>
                            <li><a href="#" target="_blank"><i class='bx bxl-pinterest'></i></a></li>
                        </ul> -->
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-footer-widget">
                        <h3>Information</h3>

                        <ul class="link-list">
                            <li><a href="about.html">Who we are</a></li>
                            <li><a href="contact.html">What we do</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="terms-of-service.html">Terms & Conditions</a></li>
                            <li><a href="customer-service.html">Delivery Information</a></li>
                            <li><a href="customer-service.html">Orders and Returns</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-footer-widget">
                        <h3>Customer Care</h3>

                        <ul class="link-list">
                            <li><a href="faq.html">Help & FAQs</a></li>
                            <li><a href="profile-authentication.html">My Account</a></li>
                            <li><a href="cart.html">Order History</a></li>
                            <li><a href="cart.html">Wishlist</a></li>
                            <li><a href="contact.html">Newsletter</a></li>
                            <li><a href="purchase-guide.html">Purchasing Policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-footer-widget">
                        <h3>Newsletter</h3>
                        <p>Sign up for our mailing list to get the latest updates & offers.</p>
                        <form class="newsletter-form" data-toggle="validator">
                            <input type="text" class="input-newsletter" placeholder="Enter your email address" name="EMAIL" required autocomplete="off">
                            <button type="submit" class="default-btn">Subscribe Now</button>
                            <div id="validator-newsletter" class="form-result"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <p>Copyright © Designed &amp; Developed by Elderly Healthcare</a> 2020</p>
                    </div>

                    <!-- <div class="col-lg-6 col-md-6">
                        <div class="payment-types">
                            <ul class="d-flex align-items-center justify-content-end">
                                <li>We accept payment via:</li>
                                <li><a href="#" target="_blank"><img src="assets/img/payment-types/visa.png" alt="image"></a></li>
                                <li><a href="#" target="_blank"><img src="assets/img/payment-types/mastercard.png" alt="image"></a></li>
                                <li><a href="#" target="_blank"><img src="assets/img/payment-types/paypal.png" alt="image"></a></li>
                                <li><a href="#" target="_blank"><img src="assets/img/payment-types/descpver.png" alt="image"></a></li>
                                <li><a href="#" target="_blank"><img src="assets/img/payment-types/american-express.png" alt="image"></a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Area -->

    <!-- Start QuickView Modal Area -->
    <div class="modal fade productsQuickView" id="productsQuickView" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class='bx bx-x'></i></span>
                </button>

                <div class="row align-items-center" id="view_product">
                
                </div>
            </div>
        </div>
    </div>
    <!-- End QuickView Modal Area -->

    <!-- Start Shopping Cart Modal -->
    <div class="modal right fade shoppingCartModal" id="shoppingCartModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class='bx bx-x'></i></span>
                </button>

                <div class="modal-body">
                    <h3>My Cart (3)</h3>

                    <div class="products-cart-content">
                        <div class="products-cart d-flex align-items-center">
                            <div class="products-image">
                                <a href="#"><img src="assets/img/products/products-img1.jpg" alt="image"></a>
                            </div>

                            <div class="products-content">
                                <h3><a href="#">Coronavirus Face Mask</a></h3>
                                <div class="products-price">
                                    <span>1</span>
                                    <span>x</span>
                                    <span class="price">$39.00</span>
                                </div>
                            </div>
                            <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                        </div>

                        <div class="products-cart d-flex align-items-center">
                            <div class="products-image">
                                <a href="#"><img src="assets/img/products/products-img2.jpg" alt="image"></a>
                            </div>

                            <div class="products-content">
                                <h3><a href="#">Protective Gloves</a></h3>
                                <div class="products-price">
                                    <span>1</span>
                                    <span>x</span>
                                    <span class="price">$99.00</span>
                                </div>
                            </div>
                            <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                        </div>

                        <div class="products-cart d-flex align-items-center">
                            <div class="products-image">
                                <a href="#"><img src="assets/img/products/products-img3.jpg" alt="image"></a>
                            </div>

                            <div class="products-content">
                                <h3><a href="#">Infrared Thermometer Gun</a></h3>
                                <div class="products-price">
                                    <span>1</span>
                                    <span>x</span>
                                    <span class="price">$90.00</span>
                                </div>
                            </div>
                            <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                        </div>
                    </div>

                    <div class="products-cart-subtotal">
                        <span>Subtotal</span>

                        <span class="subtotal">$228.00</span>
                    </div>

                    <div class="products-cart-btn">
                        <a href="#" class="default-btn">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shopping Cart Modal -->

    <!-- Start Shopping Cart Modal -->
    <div class="modal right fade shoppingWishlistModal" id="shoppingWishlistModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class='bx bx-x'></i></span>
                </button>

                <div class="modal-body">
                    <h3>My Wishlist (3)</h3>

                    <div class="products-cart-content">
                        <div class="products-cart d-flex align-items-center">
                            <div class="products-image">
                                <a href="#"><img src="assets/img/products/products-img1.jpg" alt="image"></a>
                            </div>

                            <div class="products-content">
                                <h3><a href="#">Coronavirus Face Mask</a></h3>
                                <div class="products-price">
                                    <span>1</span>
                                    <span>x</span>
                                    <span class="price">$39.00</span>
                                </div>
                            </div>
                            <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                        </div>

                        <div class="products-cart d-flex align-items-center">
                            <div class="products-image">
                                <a href="#"><img src="assets/img/products/products-img2.jpg" alt="image"></a>
                            </div>

                            <div class="products-content">
                                <h3><a href="#">Protective Gloves</a></h3>
                                <div class="products-price">
                                    <span>1</span>
                                    <span>x</span>
                                    <span class="price">$99.00</span>
                                </div>
                            </div>
                            <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                        </div>

                        <div class="products-cart d-flex align-items-center">
                            <div class="products-image">
                                <a href="#"><img src="assets/img/products/products-img3.jpg" alt="image"></a>
                            </div>

                            <div class="products-content">
                                <h3><a href="#">Infrared Thermometer Gun</a></h3>
                                <div class="products-price">
                                    <span>1</span>
                                    <span>x</span>
                                    <span class="price">$90.00</span>
                                </div>
                            </div>
                            <a href="#" class="remove-btn"><i class='bx bx-trash'></i></a>
                        </div>
                    </div>

                    <div class="products-cart-subtotal">
                        <span>Subtotal</span>

                        <span class="subtotal">$228.00</span>
                    </div>

                    <div class="products-cart-btn">
                        <a href="#" class="default-btn">View Shopping Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shopping Cart Modal -->

    <!-- Start Products Filter Modal Area -->
    <div class="modal left fade productsFilterModal" id="productsFilterModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class='bx bx-x'></i> Close</span>
                </button>

                <div class="modal-body">
                    <div class="woocommerce-widget-area">
                        <div class="woocommerce-widget price-list-widget">
                            <h3 class="woocommerce-widget-title">Filter By Price</h3>

                            <div class="collection-filter-by-price">
                                <input class="js-range-of-price" type="text" data-min="0" data-max="1055" name="filter_by_price" data-step="10">
                            </div>
                        </div>

                        <div class="woocommerce-widget color-list-widget">
                            <h3 class="woocommerce-widget-title">Color</h3>

                            <ul class="color-list-row">
                                <li class="active"><a href="#" title="Black" class="color-black"></a></li>
                                <li><a href="#" title="Red" class="color-red"></a></li>
                                <li><a href="#" title="Yellow" class="color-yellow"></a></li>
                                <li><a href="#" title="White" class="color-white"></a></li>
                                <li><a href="#" title="Blue" class="color-blue"></a></li>
                                <li><a href="#" title="Green" class="color-green"></a></li>
                                <li><a href="#" title="Yellow Green" class="color-yellowgreen"></a></li>
                                <li><a href="#" title="Pink" class="color-pink"></a></li>
                                <li><a href="#" title="Violet" class="color-violet"></a></li>
                                <li><a href="#" title="Blue Violet" class="color-blueviolet"></a></li>
                                <li><a href="#" title="Lime" class="color-lime"></a></li>
                                <li><a href="#" title="Plum" class="color-plum"></a></li>
                                <li><a href="#" title="Teal" class="color-teal"></a></li>
                            </ul>
                        </div>

                        <div class="woocommerce-widget brands-list-widget">
                            <h3 class="woocommerce-widget-title">Brands</h3>

                            <ul class="brands-list-row">
                                <li><a href="#">Gucci</a></li>
                                <li><a href="#">Virgil Abloh</a></li>
                                <li><a href="#">Balenciaga</a></li>
                                <li class="active"><a href="#">Moncler</a></li>
                                <li><a href="#">Fendi</a></li>
                                <li><a href="#">Versace</a></li>
                            </ul>
                        </div>

                        <div class="woocommerce-widget woocommerce-ads-widget">
                            <img src="assets/img/ads.jpg" alt="image">

                            <div class="content">
                                <span>New Arrivals</span>
                                <h3>Modern Electronic Thermometer</h3>
                                <a href="#" class="default-btn"><i class="flaticon-trolley"></i> Shop Now</a>
                            </div>

                            <a href="#" class="link-btn"></a>
                        </div>

                        <div class="woocommerce-widget best-seller-widget">
                            <h3 class="woocommerce-widget-title">Best Seller</h3>

                            <article class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg1" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title usmall"><a href="#">Thermometer Gun</a></h4>
                                    <span>$99.00</span>
                                    <div class="rating">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </article>

                            <article class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg2" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title usmall"><a href="#">Protective Gloves</a></h4>
                                    <span>$65.00</span>
                                    <div class="rating">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star-half'></i>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </article>

                            <article class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg3" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title usmall"><a href="#">Cosmetic Container</a></h4>
                                    <span>$139.00</span>
                                    <div class="rating">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bx-star'></i>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Products Filter Modal Area -->

    <div class="go-top"><i class='bx bx-up-arrow-alt'></i></div>

    <!-- Links of JS files -->
    <script src="{{url('assets/js/jquery.min.js')}}"></script>
    <script src="{{url('assets/js/popper.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/js/magnific-popup.min.js')}}"></script>
    <script src="{{url('assets/js/fancybox.min.js')}}"></script>
    <script src="{{url('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('assets/js/owl.carousel2.thumbs.min.js')}}"></script>
    <script src="{{url('assets/js/meanmenu.min.js')}}"></script>
    <script src="{{url('assets/js/nice-select.min.js')}}"></script>
    <script src="{{url('assets/js/rangeSlider.min.js')}}"></script>
    <script src="{{url('assets/js/sticky-sidebar.min.js')}}"></script>
    <script src="{{url('assets/js/wow.min.js')}}"></script>
    <script src="{{url('assets/js/form-validator.min.js')}}"></script>
    <script src="{{url('assets/js/contact-form-script.js')}}"></script>
    <script src="{{url('assets/js/ajaxchimp.min.js')}}"></script>
    <script src="{{url('assets/js/main.js')}}"></script>
    <!-- Datatable -->
    <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>


    <script>
        $('.quick_view').click(function() {
            console.log('hello')
            var id = $(this).attr('data-id')
            console.log(id)
            $.ajax({
                url: "/get-product",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'id': id
                },
                success: function(response) {
                    $('#view_product').html(response)
                    $('#productsQuickView').modal('show')
                    // You will get response from your PHP page (what you echo or print)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    </script>
</body>


</html>