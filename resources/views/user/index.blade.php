@extends('user.layout')


@section('content')
    <!-- Categories Section Begin -->
    <div class="container">
        {{-- <div class="row">
            @foreach ($products as $product)
                <div class="col-12 mb-4 mt-4">
                    <div class="card">
                        <img src="{{ asset('uploads/' . $product->product_image) }}" 
                             class="card-img-top" 
                             alt="{{ $product->product_name ?? 'Default Image' }}" 
                             style="height: auto; object-fit: cover; width: 100%;">
                        <div class="card-body">
                            <h2 class="card-title">{{ $product->product_name }}</h2>
                            <p class="card-text">Code: {{ $product->product_code }}</p>
                            <p class="card-text">Description: {{ $product->description }}</p>
                            <p class="card-text">Price: Rs:{{ number_format($product->price, 2) }}</p>
                            <p class="card-text">Stock: {{ $product->stock }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> --}}


        <!-- Categories Section End -->


        {{-- <section class="categories">
            <div class="container">
                <div class="row">
                    <div class="categories__slider owl-carousel">
                        @foreach ($products as $product)
                            <div class="col-lg-3">
                                <div class="card">
                                    <img src="{{ asset('uploads/' . $product->product_image) }}" class="card-img-top"
                                        alt="{{ $product->product_name ?? 'Default Image' }}"
                                        style="height: 200px; object-fit: cover; width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->product_name }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section> --}}

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




        <!-- Featured Section Begin -->
        <section class="featured spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Featured Product</h2>
                        </div>
                        <div class="featured__controls">
                            <!-- Filter Buttons -->
                            {{-- <button class="filter-btn" onclick="applyFilter(1)">Arts & Crafts</button>
                            <button class="filter-btn" onclick="applyFilter(2)">Gift Articles</button>
                            <button class="filter-btn" onclick="applyFilter(3)">Greeting Cards</button>
                            <button class="filter-btn" onclick="applyFilter(7)">Office Supplies</button>
                            <button class="filter-btn" onclick="applyFilter(4)">Home Decoration</button>
                            <button class="filter-btn" onclick="applyFilter(5)">Bags</button>
                            <button class="filter-btn" onclick="applyFilter(6)">Files</button>
                            <button class="filter-btn" onclick="applyFilter(8)">Kids’ Toys</button> --}}

                            <!-- Product List -->
                            <div id="product-list">
                                <div class="row mt-5">
                                    @foreach ($products as $product)
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                            <a href="{{ route('shop-details', $product->id) }}">
                                                <div class="card mt-5">
                                                    <img src="{{ asset('uploads/' . $product->product_image) }}"
                                                         class="card-img-top"
                                                         alt="{{ $product->product_name ?? 'Default Image' }}"
                                                         style="height: 250px; width: 100%;">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $product->product_name }}</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Featured Section End -->

        <!-- Banner Begin -->
        <div class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="banner__pic">
                            <img src="uploads/categories/1731132634.jpg" alt="Description of Image" width="100%"
                                height="300">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="banner__pic">
                            <img src="uploads/categories/1731339612.jpg" alt="Description of Image" width="100%"
                                height="300">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner End -->



        <!-- Blog Section Begin -->
        <section class="from-blog spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title from-blog__title">
                            <h2>Arts & Crafts</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="uploads/categories/1731137721.jpg" alt="Description of Image" width="100%"
                                    height="300">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> Nov 15, 2024</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5>Creative Techniques for Mastering Your Art</h5>
                                <p>Premium brushes and paints designed for artists of all skill levels, ensuring vibrant and
                                    lasting results.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="uploads/categories/1731339612.jpg" alt="Description of Image" width="100%"
                                    height="300">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> Nov 15, 2024</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5> Office Supplies for a Productive Workspace</h5>
                                <p>Discover the essential office supplies that will help you stay organized, efficient, and
                                    inspired throughout your workday.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="uploads/categories/1731213790.avif" alt="Description of Image" width="100%"
                                    height="300">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> Nov 15, 2024</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5>Explore Our Latest Collection of Trendy Bags</h5>
                                <p>From stylish handbags to durable backpacks, find the perfect bag to complement your style
                                    and carry your essentials in comfort.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Section End -->
    @endsection

    <script>
       function applyFilter(categoryId) {
    fetch(`/filter-products/${categoryId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.html) {
                document.getElementById('product-list').innerHTML = data.html;
            } else {
                document.getElementById('product-list').innerHTML = '<p>No products found.</p>';
                console.error('No HTML returned:', data);
            }
        })
        .catch(error => {
            console.error('Error fetching products:', error);
            document.getElementById('product-list').innerHTML = '<p>Error loading products.</p>';
        });
}

    </script>
