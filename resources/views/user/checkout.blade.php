@extends('user.layout')


@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    {{-- <section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your ID
                </h6>
            </div>
        </div>
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="#">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Country<span>*</span></p>
                            <input type="text">
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" placeholder="Street Address" class="checkout__input__add">
                            <input type="text" placeholder="Apartment, suite, unite ect (optinal)">
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input type="text">
                        </div>
                        <div class="checkout__input">
                            <p>Country/State<span>*</span></p>
                            <input type="text">
                        </div>
                        <div class="checkout__input">
                            <p>PostID / ZIP<span>*</span></p>
                            <input type="text">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="acc">
                                Create an account?
                                <input type="checkbox" id="acc">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <p>Create an account by entering the information below. If you are a returning customer
                            please login at the top of the page</p>
                        <div class="checkout__input">
                            <p>Account Password<span>*</span></p>
                            <input type="text">
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="diff-acc">
                                Ship to a different address?
                                <input type="checkbox" id="diff-acc">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkout__input">
                            <p>Order notes<span>*</span></p>
                            <input type="text"
                                placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                      
                    </div>
                </div>
            </form>
        </div>
    </div>
</section> --}}

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
                                                <input type="number" value="{{ $product['quantity'] ?? 1 }}"
                                                    id="quantity-{{ $id }}" class="quantity-input" min="1"
                                                    readonly>
                                            </td>
                                            <td class="shoping__cart__total" id="total-{{ $id }}">
                                                @if (is_object($product))
                                                    Rs. {{ number_format($product->price * 1, 2) }}
                                                @elseif (is_array($product))
                                                    Rs.
                                                    {{ number_format($product['price'] * ($product['quantity'] ?? 1), 2) }}
                                                @endif
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
                                        <td colspan="4" class="text-center">Your cart is empty.</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td colspan="2"><strong>Total:</strong></td>
                                    <td class="shoping__cart__total" id="grand-total">Rs.
                                        {{ number_format($total ?? 0, 2) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <!-- Centered Button -->
                                        <a href="javascript:void(0)" class="primary-btn" onclick="showOrderForm()"
                                            style="display: inline-block; margin: 0 auto;">
                                            Checkout
                                        </a>

                                        <!-- Centered Hidden Form for Order Details -->
                                        <div id="order-form"
                                        style="display: none; margin-top: 20px; max-width: 100%; text-align: left; padding: 20px; background-color: #f9f9f9; border-radius: 8px;">
                                        <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <h4 style="text-align: center;">Order Details</h4>
                                        
                                            <div class="mb-3">
                                                <label for="customer_name" class="form-label">Customer Name</label>
                                                <input type="text" class="form-control" id="customer_name" name="customer_name" 
                                                    value="{{ Auth::user()->name }}" placeholder="Enter customer name" required readonly>
                                                <input type="text" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" 
                                                    value="{{ Auth::user()->email }}" placeholder="Enter email address" required readonly>
                                            </div>
                                        
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="text" class="form-control" id="phone" name="phone" 
                                                    value="{{ Auth::user()->mobile }}" placeholder="Enter phone number" required readonly>
                                            </div>
                                        
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <textarea class="form-control" id="address" name="address" 
                                                    placeholder="Enter address" rows="3"></textarea>
                                            </div>
                                        
                                            <div class="mb-3">
                                                <label for="quantity" class="form-label">Total Quantity</label>
                                                <input type="text" class="form-control" id="quantity" name="quantity" 
                                                    value="{{ count(session('cart')) }}" placeholder="Total Quantity" required readonly>
                                            </div>
                                        
                                            <div class="mb-3">
                                                <label for="total_amount" class="form-label">Total Amount</label>
                                                <input type="text" class="form-control" id="total_amount" name="total_amount" 
                                                    value="{{ $total }}" placeholder="Total Amount" required readonly>
                                            </div>
                                        
                                            <!-- Delivery Type Dropdown -->
                                            <div class="mb-3">
                                                <label for="delivery_type" class="form-label">Delivery Type</label>
                                                <select class="form-select" id="delivery_type" name="delivery_type" required>
                                                    <option value="">Select Delivery Type</option>
                                                    <option value="1">Standard</option>
                                                    <option value="2">Express</option>
                                                </select>
                                            </div>
                                        
                                            <!-- Payment Status Dropdown -->
                                            <div class="mb-3">
                                                <label for="payment_status" class="form-label">Payment Status</label>
                                                <select class="form-select" id="payment_status" name="payment_status" 
                                                    required onchange="toggleAccountField()">
                                                    <option value="">Select Payment Status</option>
                                                    <option value="Online">Online</option>
                                                    <option value="COD">Cash on Delivery (COD)</option>
                                                </select>
                                            </div>
                                        
                                            <!-- Hidden Account Number Field -->
                                            <div class="mb-3" id="account_number_field" style="display: none;">
                                                <label for="account_number" class="form-label">Bank Account Number</label>
                                                <input type="text" class="form-control" id="account_number" name="account_number" 
                                                    placeholder="Enter Account Number" value="01421234567891" readonly>
                                            </div>
                                            <input type="submit" class="primary-btn" value="Add Order" 
                                                style="display: block; width: 20%; margin: 0 auto; text-align: center;" />
                                        </form>
                                        
                                    </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <script>
        function showOrderForm() {
            document.getElementById("order-form").style.display = "block";
        }


        function toggleAccountField() {
        const paymentStatus = document.getElementById('payment_status').value;
        const accountField = document.getElementById('account_number_field');
        if (paymentStatus === 'Online') {
            accountField.style.display = 'block';
            document.getElementById('account_number').setAttribute('required', 'required');
        } else {
            accountField.style.display = 'none';
            document.getElementById('account_number').removeAttribute('required');
        }
    }

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


    <!-- Checkout Section End -->

@endsection
