<x-public-layout>

    @php
        $publicRoute = route('public.') . '/';
    @endphp

    <x-error-alert/>

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="{{ $book->image_url }}" alt>
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="{{ $publicRoute }}img/product/details/product-details-2.jpg"
                                src="img/product/details/thumb-1.jpg" alt>
                            <img data-imgbigurl="{{ $publicRoute }}img/product/details/product-details-3.jpg"
                                src="{{ $publicRoute }}img/product/details/thumb-2.jpg" alt>
                            <img data-imgbigurl="{{ $publicRoute }}img/product/details/product-details-5.jpg"
                                src="{{ $publicRoute }}img/product/details/thumb-3.jpg" alt>
                            <img data-imgbigurl="{{ $publicRoute }}img/product/details/product-details-4.jpg"
                                src="{{ $publicRoute }}img/product/details/thumb-4.jpg" alt>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $book->name }}</h3>
                        <h4>{{ $book->author }}</h4>
                        <div class="product__details__rating">
                            @if ($book->getStarsRate() >= 1)
                                @for ($i = 1; $i <= $book->getStarsRate(); $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            @endif
                            @if ($book->getStarsRate() - (int) $book->getStarsRate() != 0 && $book->getStarsRate() != 5)
                                <i class="fa fa-star-half-o"></i>
                            @else
                                <i class="fa fa-star-o"></i>
                            @endif
                            @if ($book->getStarsRate() < 4)
                                @for ($i = 0; $i < 4 - (int) $book->getStarsRate(); $i++)
                                    <i class="fa fa-star-o"></i>
                                @endfor
                            @endif
                            <span>{{ $book->getStarsRate() }}</span>
                            <span>({{ $book->ratings->count() }} reviews)</span>
                        </div>
                        @if ($book->discount == null)
                            <div class="product__details__price">${{ $book->price }}</div>
                        @else
                            <del class="text-red-500">${{ $book->price }}</del>
                            <div class="product__details__price">${{ $book->priceAfterDiscount() }}
                            </div>
                        @endif
                        <p>{{ $book->description }}</p>
                        <form action="{{ route('public.carts.store',$book) }}" method="POST">
                            @csrf
                            @method("POST")

                            {{-- <input type="hidden" name="book_id" value="{{ $book->id }}"/> --}}
                            <div class="product__details__quantity">
                                <div class="quantity" style="user-select: none">
                                    <div class="pro-qty">
                                        <input id="quantity" name="quantity" value="1" readonly/>
                                    </div>
                                </div>
                            </div>
                            <button class="primary-btn">ADD TO CARD</button>
                        </form>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping.
                                    <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews
                                    <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula
                                        elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta
                                        dapibus. Proin eget tortor risus.
                                        Vivamus
                                        suscipit tortor eget felis porttitor
                                        volutpat. Vestibulum ac diam sit amet
                                        quam
                                        vehicula elementum sed sit amet dui.
                                        Donec rutrum congue leo eget malesuada.
                                        Vivamus suscipit tortor eget felis
                                        porttitor volutpat. Curabitur arcu erat,
                                        accumsan id imperdiet et, porttitor at
                                        sem. Praesent sapien massa, convallis a
                                        pellentesque nec, egestas non nisi.
                                        Vestibulum ac diam sit amet quam
                                        vehicula
                                        elementum sed sit amet dui. Vestibulum
                                        ante ipsum primis in faucibus orci
                                        luctus
                                        et ultrices posuere cubilia Curae; Donec
                                        velit neque, auctor sit amet aliquam
                                        vel, ullamcorper sit amet ligula. Proin
                                        eget tortor risus.</p>
                                    <p>Praesent sapien massa, convallis a
                                        pellentesque nec, egestas non nisi.
                                        Lorem
                                        ipsum dolor sit amet, consectetur
                                        adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a.
                                        Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna
                                        dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget
                                        tincidunt nibh pulvinar a.
                                        Vestibulum ac diam sit amet quam
                                        vehicula elementum sed sit amet dui. Sed
                                        porttitor lectus nibh. Vestibulum ac
                                        diam sit amet quam vehicula elementum
                                        sed sit amet dui. Proin eget tortor
                                        risus.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula
                                        elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta
                                        dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis
                                        porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit
                                        amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor
                                        eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id
                                        imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque
                                        nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum
                                        sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et
                                        ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet
                                        aliquam vel, ullamcorper sit amet
                                        ligula.
                                        Proin eget tortor risus.</p>
                                    <p>Praesent sapien massa, convallis a
                                        pellentesque nec, egestas non nisi.
                                        Lorem
                                        ipsum dolor sit amet, consectetur
                                        adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a.
                                        Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna
                                        dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget
                                        tincidunt nibh pulvinar a.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula
                                        elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta
                                        dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis
                                        porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit
                                        amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor
                                        eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id
                                        imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque
                                        nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum
                                        sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et
                                        ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet
                                        aliquam vel, ullamcorper sit amet
                                        ligula.
                                        Proin eget tortor risus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg"
                            data-setbg="{{ $publicRoute }}img/product/product-1.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg"
                            data-setbg="{{ $publicRoute }}img/product/product-2.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg"
                            data-setbg="{{ $publicRoute }}img/product/product-3.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg"
                            data-setbg="{{ $publicRoute }}img/product/product-7.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
</x-public-layout>
