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
                                                    <img src="{{ asset('uploads/' . ($product->product_image ?? 'default-image.jpg')) }}"
                                                        class="card-img-top"
                                                        alt="{{ $product->product_name ?? 'Default Image' }}"
                                                        style="height: auto; object-fit: cover; width: 20%;">
                                                    <h5>{{ $product->product_name ?? 'Unknown Product' }}</h5>
                                                @elseif (is_array($product))
                                                    <img src="{{ asset('uploads/' . ($product['image'] ?? 'default-image.jpg')) }}"
                                                        class="card-img-top" alt="{{ $product['name'] ?? 'Default Image' }}"
                                                        style="height: auto; object-fit: cover; width: 20%;">
                                                    <h5>{{ $product['name'] ?? 'Unknown Product' }}</h5>
                                                @else
                                                    <h5>Invalid Product</h5>
                                                @endif
                                            </td>
                                            <td class="shoping__cart__price">
                                                @if (is_object($product))
                                                    Rs. {{ number_format($product->price ?? 0, 2) }}
                                                @elseif (is_array($product))
                                                    Rs. {{ number_format($product['price'] ?? 0, 2) }}
                                                @endif
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <span class="dec qtybtn"
                                                            onclick="updateQuantity({{ $id }}, 'decrease')">-</span>
                                                        <input type="number" value="{{ $product['quantity'] ?? 1 }}"
                                                            id="quantity-{{ $id }}" class="quantity-input"
                                                            min="1" readonly>
                                                        <span class="inc qtybtn"
                                                            onclick="updateQuantity({{ $id }}, 'increase')">+</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total" id="total-{{ $id }}">
                                                @if (is_object($product))
                                                    Rs. {{ number_format($product->price * 1, 2) }}
                                                @elseif (is_array($product))
                                                    Rs.
                                                    {{ number_format($product['price'] * ($product['quantity'] ?? 1), 2) }}
                                                @endif
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <a href="{{ route('remove-cart', $id) }}">
                                                    <span class="icon_close"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @php
                                            if (is_object($product)) {
                                                $total += $product->price * 1;
                                            } elseif (is_array($product)) {
                                                $total += $product['price'] * ($product['quantity'] ?? 1);
                                            }
                                        @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Your cart is empty.</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td colspan="2"><strong>Total:</strong></td>
                                    <td class="shoping__cart__total" id="grand-total">Rs.
                                        {{ number_format($total ?? 0, 2) }}
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">
                                        <a href="{{ auth()->check() ? url('checkout') : url('sign') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table> 
                    </div>  
                </div>
            </div>
        </div>
    </section


    <!-- shopping Cart Section End -->

    <script>
        function updateQuantity(productId, action) {
            // Get the current quantity
            let quantityInput = document.getElementById('quantity-' + productId);
            let currentQuantity = parseInt(quantityInput.value) || 1; // Default to 1 if NaN or undefined
    
            // Update the quantity based on the action
            if (action === 'increase') {
                currentQuantity++;
            } else if (action === 'decrease' && currentQuantity > 1) {
                currentQuantity--;
            }
    
            // Update the input value
            quantityInput.value = currentQuantity;
    
            // Get the price of the product
            let price = parseFloat(document.querySelector(`tr[data-id="${productId}"] .shoping__cart__price`).innerText
                .replace('Rs. ', '').replace(',', ''));
    
            // Calculate the new total for this item
            let itemTotal = price * currentQuantity;
            document.getElementById('total-' + productId).innerText = 'Rs. ' + itemTotal.toFixed(2);
    
            // Calculate the overall cart total
            let grandTotal = 0;
            document.querySelectorAll('.shoping__cart__total').forEach(function(totalElement) {
                grandTotal += parseFloat(totalElement.innerText.replace('Rs. ', '').replace(',', ''));
            });
    
            let grandTotalElement = document.getElementById('grand-total');
            if (grandTotalElement) {
                grandTotalElement.innerText = 'Rs. ' + grandTotal.toFixed(2);
            } else {
                console.error('Grand total element not found');
            }
    
            // Make an AJAX request to update the quantity in the session
            $.ajax({
                url: '/cart/update', // Your route for updating the cart
                method: 'POST',
                data: {
                    product_id: productId,
                    quantity: currentQuantity,
                    _token: '{{ csrf_token() }}' // CSRF token for security
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
@endsection
