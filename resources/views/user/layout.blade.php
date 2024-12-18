<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arts & Crafts</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <!-- Css Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/elegant-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slicknav.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="/"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="{{ url('shoping-cart') }}"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('shop-grid') }}">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{ url('shop-details') }}">Shop Details</a></li>
                        <li><a href="{{ url('showCart') }}">Shoping Cart</a></li>
                        <li><a href="{{ url('checkout') }}">Check Out</a></li>
                        <li><a href="{{ url('contact') }}">Contact</a></li>
                    </ul>
                </li>
            </ul>


        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> Email: info@aptech.com</li>
                <li>Free Shipping for all Order</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i>info@aptech.com</li>
                                <li>Free Shipping for all Order</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            @if (Auth::guest())
                                <div class="header__top__right__auth">
                                    <a href="{{ url('sign') }}"><i class="fa fa-user"></i> Sign up</a>
                                </div>
                                <div class="header__top__right__auth">
                                    <a href="{{ url('login') }}"><i class="fa fa-user"></i> Login</a>
                                </div>
                            @else
                            <div class="header__top__right__auth">
                                <a href="{{ url('logout') }}"><i class="fa fa-user"></i> Logout</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./">
                            <img src="img/logo.png" alt="" style="width: 80px; height: auto;">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul class="header-menu-list">
                            <li class="active"><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('shop-grid') }}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{ url('showCart') }}">Shopping Cart</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('about') }}">About</a></li>
                            <li><a href="{{ url('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a class="frontorder" href="{{ url('frontorder') }}">Orders</a></li>
                            <li><a href="{{ url('showCart') }}"><i class="fa fa-shopping-bag"></i>
                                    <span>
                                        @if (session('cart'))
                                            {{ count(session('cart')) }}
                                        @else
                                            {{ '0' }}
                                        @endif
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>





    <!-- Hero Section Begin -->

    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <!-- Category Filter Section -->
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        <!-- Filter Form with Checkboxes -->
                        <form method="GET" action="{{ route('filter-products') }}">
                            <ul>
                                <li><input type="checkbox" name="filters[]" value="1"
                                        {{ in_array('1', request('filters', [])) ? 'checked' : '' }}> Arts & Crafts
                                </li>
                                <li><input type="checkbox" name="filters[]" value="2"
                                        {{ in_array('2', request('filters', [])) ? 'checked' : '' }}> Gift Articles
                                </li>
                                <li><input type="checkbox" name="filters[]" value="3"
                                        {{ in_array('3', request('filters', [])) ? 'checked' : '' }}> Greeting Cards
                                </li>
                                <li><input type="checkbox" name="filters[]" value="7"
                                        {{ in_array('7', request('filters', [])) ? 'checked' : '' }}> Office Supplies
                                </li>
                                <li><input type="checkbox" name="filters[]" value="4"
                                        {{ in_array('4', request('filters', [])) ? 'checked' : '' }}> Home decoration
                                </li>
                                <li><input type="checkbox" name="filters[]" value="5"
                                        {{ in_array('5', request('filters', [])) ? 'checked' : '' }}> Bags</li>
                                <li><input type="checkbox" name="filters[]" value="6"
                                        {{ in_array('6', request('filters', [])) ? 'checked' : '' }}> Files</li>
                                <li><input type="checkbox" name="filters[]" value="8"
                                        {{ in_array('8', request('filters', [])) ? 'checked' : '' }}> Kids’ Toys</li>
                            </ul>
                        </form>

                    </div>
                </div>

                <!-- Search Section -->
                {{-- <div class="hero__search__form">
                    <form method="GET" action="{{ route('filter-products') }}">
                        <input type="text" name="search" placeholder="What do you need?"
                            value="{{ request('search') }}">
                        <button type="submit" class="site-btn">SEARCH</button>
                    </form>
                </div> --}}
            </div>
        </div>
    </section>

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="/"><img src="img/logo.png" alt="" style="width: 150px; height: auto;"></a>
                        </div>
                        <ul>
                            <li>Address:Shah Faisal Colony Flyover, Faisal Cantonment, Karachi, Karachi City, Sindh</li>
                            <li>Phone: (021) 34580415</li>
                            <li>Email: info@aptech.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li class="active"><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('shop-grid') }}">Shop</a></li>
                            <li><a href="{{ url('about') }}">About</a></li>
                            <li><a href="{{ url('contact') }}">Contact</a></li>
                            <li><a href="{{ url('showCart') }}">Shopping Cart</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | Arts & Crafts <i
                                    class="fa fa-heart" aria-hidden="true"></i> by Arts<a href="#"
                                    target="_blank"></a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <!-- Js Plugins -->
    <script>
        // Automatically submit the filter form when a checkbox is clicked
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                this.form.submit();
            });
        });
    </script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>



</body>

</html>
