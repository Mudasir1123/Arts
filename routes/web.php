<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
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
    return view('user.checkout');
});
Route::get('about', function () {
    return view('user.about');
});
Route::get('contact', function () {
    return view('user.contact');
});
// Admin Routes
Route::get('/adminn', function () {
    return view('Admin.index');
});
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
// Route::get('/products', function () {
//     return view('Admin.product.products');
// });
// Route::get('/addproduct', function () {
//     return view('Admin.product.addproduct');
// });
// Route::get('/updateproduct', function () {
//     return view('Admin.product.updateproduct');
// });
// Route::get('/viewproduct', function () {
//     return view('Admin.product.viewproduct');
// });
// Route::get('/user', function () {
//     return view('Admin.users.user');
// })->name('user');
Route::get('/adduser', function () {
    return view('Admin.users.adduser');
});

Route::get('/order', function () {
    return view('Admin.order.order');
});
Route::get('/updateorder', function () {
    return view('Admin.order.updateorder');
});
Route::get('/detailorder', function () {
    return view('Admin.order.detailorder');
});

// category route
Route::get('/addcategory', function () {
    return view('Admin.category.addcategory');
});


// User Routes
Route::post('/save', [UserController::class, 'saveUser']);
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


Route::get('shopping-cart/{id}', [UserController::class, 'addToCart'])->name('shopping-cart');

Route::get('/remove-cart/{id}', [UserController::class, 'removeFromCart'])->name('remove-cart');






