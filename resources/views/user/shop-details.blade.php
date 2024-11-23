@extends('user.layout')

@section('content')
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img src="{{ asset('uploads/' . $product->product_image) }}" class="card-img-top"
                                alt="{{ $product->product_name ?? 'Default Image' }}"
                                style="height: auto; object-fit: cover; width: 100%;">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="img/product/details/product-details-2.jpg"
                                src="img/product/details/thumb-1.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-3.jpg"
                                src="img/product/details/thumb-2.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-5.jpg"
                                src="img/product/details/thumb-3.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-4.jpg"
                                src="img/product/details/thumb-4.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $product->product_name }}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <strong class="card-text">Price: Rs:{{ number_format($product->price, 2) }}</strong>
                        <p>Description: {{ $product->description }}</p>

                        <form action="{{ route('addToCart', $product->id) }}" method="POST">
                            @csrf <!-- Include CSRF token for security -->
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="number" name="quantity" value="1" min="1"
                                            id="prod_quantity">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="primary-btn">ADD TO CART</button>
                        </form>

                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Stock: </b> <span>{{ $product->stock }}</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
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
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->

    {{-- <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
               <div class="related-products">
                <div class="row mt-5">
                    @foreach ($products as $product)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <a href="{{ route('shop-details', $product->id) }}">
                                <div class="card mt-5">
                                    <img src="{{ asset('uploads/' . $product->product_image) }}" class="card-img-top"
                                        alt="{{ $product->product_name ?? 'Default Image' }}" style="height: 250px; width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->product_name }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
</div> --}}


    </section>
    <!-- Related Product Section End -->
@endsection
