<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
// user routes


//  Route::get('/', function () {
//     return view('user.index');
// });
Route::get('shop-grid', function () {
    return view('user.shop-grid');
});
Route::get('shop-details', function () {
    return view('user.shop-details');
});
// Route::get('shopping-cart', function () {
//     return view('user.shopping-cart');
// });
Route::get('checkout', function () {
    if (Auth::user()) {
        return view('user.checkout');
    } else {
        return view('user.login');
    }
});
Route::get('about', function () {
    return view('user.about');
});
Route::get('contact', function () {
    return view('user.contact');
});
// Admin Routes
Route::get('/adminn', function () {
    if (Auth::user() && Auth::user()->role == 0) {
        return view('Admin.index');
    } else {
        return view('Admin.signin');
    }
})->name('adminn');
Route::get('/404', function () {
    return view('Admin.404');
});
Route::get('/blank', function () {
    return view('Admin.blank');
});
Route::get('/button', function () {
    return view('Admin.button');
});
Route::get('/chart', function () {
    return view('Admin.chart');
});
Route::get('/element', function () {
    return view('Admin.element');
});
Route::get('/form', function () {
    return view('Admin.form');
});
Route::get('/signin', function () {
    return view('Admin.signin');
});
Route::get('/signup', function () {
    return view('Admin.signup');
});
Route::get('/table', function () {
    return view('Admin.table');
});
Route::get('/typography', function () {
    return view('Admin.typography');
});
Route::get('/widget', function () {
    return view('Admin.widget');
});

Route::get('/adduser', function () {
    return view('Admin.users.adduser');
});

Route::get('/detailorder', function () {
    return view('Admin.order.detailorder');
});

// category route
Route::get('/addcategory', function () {
    return view('Admin.category.addcategory');
});



Route::post('/sign', [UserController::class, 'storeUser']);
// User Routes
Route::post('/save', [UserController::class, 'saveUser']);
Route::post('/SignUp', [UserController::class, 'SignUp']);
Route::get('/user', [UserController::class, 'showUser'])->name('user');
Route::get('/updateuser/{id}', [UserController::class, 'editUser'])->name('updateuser');
Route::post('/update', [UserController::class, 'updateUser'])->name('update');
Route::get('viewuser/{id}', [UserController::class, 'viewUser'])->name('viewuser');
Route::get('userdelete/{id}', [UserController::class, 'deleteUser'])->name('deleteuser');


// Product Routes
Route::get('/addproduct', [userController::class, 'addproduct'])->name('addproduct');
Route::post('/products', [userController::class, 'saveProduct']);
Route::get('/products', [userController::class, 'showProduct'])->name('products');
Route::get('/updateproducts/{id}', [UserController::class, 'editproducts'])->name('updateproducts');
Route::post('/updateproduct', [UserController::class, 'updateproduct'])->name('updateproduct');
Route::get('viewproduct/{id}', [UserController::class, 'viewproduct'])->name('viewproduct');
Route::get('productdelete/{id}', [userController::class, 'deleteProduct'])->name('productdelete');

Route::get('/', [UserController::class, 'seeHome'])->name('/');

Route::get('/shop-details/{id}', [UserController::class, 'seeProduct'])->name('shop-details');





// Category Routes  
Route::post('/category', [UserController::class, 'saveCategory']);
Route::get('/category', [UserController::class, 'showCategory'])->name('category');
Route::get('/updateCategory/{id}', [UserController::class, 'editCategory'])->name('updateCategory.form');
Route::post('/updateCategory/{id}', [UserController::class, 'updateCategory'])->name('updateCategory.submit');
Route::get('viewCategory/{id}', [UserController::class, 'viewCategory'])->name('viewCategory');
Route::get('deleteCategory/{id}', [UserController::class, 'deleteCategory'])->name('deleteCategory');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// In routes/web.php
Route::get('/filter-products', [UserController::class, 'filterProducts'])->name('filter-products');


Route::post('addToCart/{id}', [UserController::class, 'addToCart'])->name('addToCart');
Route::post('/cart/update', [UserController::class, 'updateCart'])->name('cart.update');

// Route::get('showCart', [UserController::class, 'showCart'])->name('showCart');

Route::get('/showCart', function () {
    return view('user.shopping-cart');
});

Route::get('/remove-cart/{id}', [UserController::class, 'removeFromCart'])->name('remove-cart');



// Route::get('/checkout', 'CheckoutController@index')->middleware('auth');


Route::get('/login', function () {
    return view('user.login');
});
Route::get('/sign', function () {
    return view('user.sign');
});
Route::post('/loginLogic', [UserController::class, 'login'])->name('loginLogic');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


// orders Routes

Route::post('/userorder', [UserController::class, 'saveOrder'])->name('order.store');
Route::get('/updateorder/{id}', [UserController::class, 'editOrder'])->name('updateorder');
Route::get('/updateOrderStatus', [UserController::class, 'updateOrder'])->name('updateOrderStatus');
Route::get('vieworder/{id}', [UserController::class, 'viewOrder'])->name('vieworder');




Route::get('/order', [UserController::class, 'showOrder'])->name('order');

Route::get('/frontorder', [UserController::class, 'frontshowOrder'])->name('frontorder');
Route::get('viewfrontorder/{id}', [UserController::class, 'viewfrontorder'])->name('viewfrontorder');



Route::post('/feedback/store', [UserController::class, 'store'])->name('feedback.store');
Route::get('/feedback/{orderId}', [UserController::class, 'showFeedbackForOrder'])->name('feedback.show');
// Route::get('/feedback/{orderId}', [UserController::class, 'showFeedbackForOrder'])->name('feedback.show');

// Route::get('/shop-details/{id}', [UserController::class, 'show'])->name('shop-details'); Related Products

Route::get('/shop-grid', [UserController::class, 'seeShop'])->name('shop-grid');

Route::get('/filter-products/{id}', [UserController::class, 'filterProduct']);

// Route::get('/shop-details/{id}', [UserController::class, 'related'])->name('shop-details');


