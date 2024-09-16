<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="{{ route('public.cart') }}"><i class="fa fa-shopping-bag"></i>
                    @if (Auth::user() != null && Auth::user()->cart !== null)
                        @if (Auth::user()->cart->items->count() > 0)
                            <span>
                                {{ Auth::user()->cart->items->count() }}
                            </span>
                        @endif
                    @endif
                </a>
            </li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="img/language.png" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Arabic</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="{{ Route::is('public.') ? 'active' : '' }}"><a href="{{ route('public.') }}">Home</a></li>
            <li
                class="{{ Route::is('public.grid') |
                Route::is('public.details') |
                Route::is('public.cart') |
                Route::is('public.checkout')
                    ? 'active'
                    : '' }}">
                <a href="{{ route('public.grid') }}">Shop</a>
            </li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="{{-- route('public.details') --}}">Shop Details</a></li>
                    <li><a href="{{ route('public.cart') }}">Shoping Cart</a></li>
                    <li><a href="{{ route('public.checkout') }}">Check Out</a></li>
                </ul>
            </li>
            <li class="{{ Route::is('public.about') ? 'active' : '' }}"><a href="{{ route('public.about') }}">About</a>
            </li>
            <li class="{{ Route::is('public.contact') ? 'active' : '' }}"><a
                    href="{{ route('public.contact') }}">Contact</a></li>
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
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
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
                            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                            <li>Free Shipping for all Order of $99</li>
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
                            @if (Auth::user())
                                <a href=""
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                    @method('POST')
                                </form>
                            @else
                                <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="./index.html"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="{{ Route::is('public.') ? 'active' : '' }}"><a href="{{ route('public.') }}"><a
                                    href="{{ route('public.') }}">Home</a></li>
                        <li
                            class="{{ Route::is('public.grid') |
                            Route::is('public.details') |
                            Route::is('public.cart') |
                            Route::is('public.checkout')
                                ? 'active'
                                : '' }}">
                            <a href="{{ route('public.grid') }}">Shop</a>
                        </li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="{{-- route('public.details') --}}">Shop Details</a></li>
                                <li><a href="{{ route('public.cart') }}">Shoping Cart</a></li>
                                <li><a href="{{ route('public.checkout') }}">Check Out</a></li>
                                4
                            </ul>
                        </li>
                        <li class="{{ Route::is('public.about') ? 'active' : '' }}"><a
                                href="{{ route('public.about') }}">About</a></li>
                        <li class="{{ Route::is('public.contact') ? 'active' : '' }}"><a
                                href="{{ route('public.contact') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li>
                            <a href="{{ route('public.cart') }}">
                                <i class="fa fa-shopping-bag"></i>
                                @if (Auth::user() != null && Auth::user()->cart !== null)
                                    @if (Auth::user()->cart->items->count() > 0)
                                        <span>
                                            {{ Auth::user()->cart->items->count() }}
                                        </span>
                                    @endif
                                @endif
                            </a>
                        </li>
                    </ul>
                    <div class="header__cart__price">item: <span>$150.00</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
