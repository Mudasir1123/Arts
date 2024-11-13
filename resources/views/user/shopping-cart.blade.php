@extends('user.layout')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- shopping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0; // Initialize total
                                @endphp
                            
                                @if (session('cart') && count(session('cart')) > 0)
                                    @foreach (session('cart') as $id => $product)
                                        <tr data-id="{{ $id }}">
                                            <td class="shoping__cart__item">
                                                @if (is_object($product))
                                                    <img src="{{ asset('uploads/' . ($product->product_image ?? 'default-image.jpg')) }}" class="card-img-top"
                                                         alt="{{ $product->product_name ?? 'Default Image' }}" style="height: auto; object-fit: cover; width: 20%;">
                                                    <h5>{{ $product->product_name ?? 'Unknown Product' }}</h5>
                                                @elseif (is_array($product))
                                                    <img src="{{ asset('uploads/' . ($product['image'] ?? 'default-image.jpg')) }}" class="card-img-top"
                                                         alt="{{ $product['name'] ?? 'Default Image' }}" style="height: auto; object-fit: cover; width: 20%;">
                                                    <h5>{{ $product['name'] ?? 'Unknown Product' }}</h5>
                                                @else
                                                    <h5>Invalid Product</h5> <!-- Handle unexpected cases -->
                                                @endif
                                            </td>
                                            <td class="shoping__cart__price">
                                                @if (is_object($product))
                                                    ${{ number_format($product->price ?? 0, 2) }}
                                                @elseif (is_array($product))
                                                    ${{ number_format($product['price'] ?? 0, 2) }}
                                                @endif
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="number" value="@if (is_object($product)) {{ 1 }} @elseif (is_array($product)) {{ $product['quantity'] ?? 1 }} @endif" id="quantity-{{ $id }}" class="quantity-input" min="1">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                @if (is_object($product))
                                                    ${{ number_format($product->price * 1, 2) }}
                                                @elseif (is_array($product))
                                                    ${{ number_format($product['price'] * ($product['quantity'] ?? 1), 2) }}
                                                @endif
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <a href="{{ route('remove-cart', $id) }}">
                                                    <span class="icon_close"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @php
                                            // Accumulate total price
                                            if (is_object($product)) {
                                                $total += $product->price * 1; // Default quantity to 1 for stdClass objects
                                            } elseif (is_array($product)) {
                                                $total += $product['price'] * ($product['quantity'] ?? 1); // Use array syntax
                                            }   
                                        @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Your cart is empty.</td>
                                    </tr>
                                @endif
                            
                                <tr>
                                    <td colspan="3" class="shoping__cart__total">Total</td>
                                    <td class="shoping__cart__total">${{ number_format($total, 2) }}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                            
                            <script>
                                // JavaScript to handle the quantity change and update prices dynamically
                                document.querySelectorAll('.quantity-input').forEach(input => {
                                    input.addEventListener('input', function () {
                                        var quantity = parseInt(this.value);
                                        if (isNaN(quantity) || quantity < 1) {
                                            this.value = 1; // Ensure that quantity doesn't go below 1
                                            quantity = 1;
                                        }
                                
                                        var productId = this.id.split('-')[1]; // Get product id from the input's id attribute
                                        var priceText = document.querySelector('tr[data-id="'+productId+'"] .shoping__cart__price').textContent.trim();
                                        
                                        // Ensure price is correctly parsed, remove dollar sign and commas
                                        var pricePerUnit = parseFloat(priceText.replace('$', '').replace(/,/g, ''));
                                
                                        if (isNaN(pricePerUnit)) {
                                            console.error("Invalid price: " + priceText);
                                            return; // Exit if price is invalid
                                        }
                                
                                        // Multiply the price by the quantity
                                        var newTotal = pricePerUnit * quantity;
                                
                                        var totalCell = document.querySelector('tr[data-id="'+productId+'"] .shoping__cart__total');
                                        totalCell.textContent = '$' + newTotal.toFixed(2);
                                
                                        // Update overall cart total
                                        updateCartTotal();
                                    });
                                });
                                
                                // Function to update the total price for all products in the cart
                                function updateCartTotal() {
                                    var total = 0;
                                    document.querySelectorAll('.shoping__cart__total').forEach(cell => {
                                        var priceText = cell.textContent.trim();
                                        var itemTotal = parseFloat(priceText.replace('$', '').replace(/,/g, ''));
                                
                                        if (!isNaN(itemTotal)) {
                                            total += itemTotal;
                                        }
                                    });
                                
                                    // Update the total displayed at the bottom
                                    document.querySelector('.shoping__cart__total').textContent = '$' + total.toFixed(2);
                                }
                                </script>
                                
                            
                            
                        </table>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('shop.index') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right">
                            <span class="icon_loading"></span> Update Cart
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>${{ number_format($total, 2) }}</span></li>
                            <li>Total <span>${{ number_format($total, 2) }}</span></li>
                        </ul>
                        <a href="{{ route('checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>


    <!-- shopping Cart Section End -->
@endsection
