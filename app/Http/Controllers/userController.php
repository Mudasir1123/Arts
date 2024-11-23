<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Order;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    public function showUser()
    {
        $userData =  DB::table('tbl_user')->get();
        return view('Admin.users.user', ["data" => $userData]);
    }


    public function saveUser(Request $req)
    {
        $req->validate([
            'file' => 'required|mimes:jpg,jpeg,png,webp|max:3000',
        ]);

        $fileName = time() . '.' . $req->file->extension();
        $req->file->move(public_path('uploads'), $fileName);

        $person = DB::table('tbl_user')->insert(
            [
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'mobile' => $req->mobile,
                'gender' => $req->gender,
                'role' => $req->role,
                'image' =>  $fileName,
                'created_at' => now(),
            ]
        );

        if ($person) {
            // return 'Data Saved';

            // return '<script>window.location.href="/"</script>';
            return redirect()->route('user');
        } else {
            return 'Error';
        }
    }

    public function SignUp(Request $req)
    {
        // $req->validate([
        //     'file' => 'required|mimes:jpg,jpeg,png,webp|max:3000',
        // ]);

        // $fileName = time() . '.' . $req->file->extension();
        // $req->file->move(public_path('uploads'), $fileName);

        $person = DB::table('tbl_user')->insert(
            [
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                // 'mobile' => $req->mobile,
                // 'gender' => $req->gender,
                'role' => 0,
                // 'image' =>  $fileName,
                'created_at' => now(),
            ]
        );

        if ($person) {
            return view('Admin.signin');
        } else {
            return 'Error';
        }
    }

    public function editUser(String $id)
    {
        $user = DB::table('tbl_user')->where('id', $id)->get();
        return view('Admin.users.updateuser', ['data' => $user]);
    }


    public function updateUser(Request $req)
    {
        // Validate inputs
        $req->validate([
            'id' => 'required|exists:tbl_user,id', // Ensure the user exists
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:tbl_user,email,' . $req->id,
            'password' => 'nullable|string|min:8',
            'mobile' => 'required|numeric',
            'gender' => 'required|in:male,female',
            'role' => 'required|in:0,1,2',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp|max:3000', // Validate image format
        ]);

        // Retrieve the existing user record
        $user = DB::table('tbl_user')->where('id', $req->id)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Prepare data for updating
        $updateData = [
            'name' => $req->name,
            'email' => $req->email,
            'mobile' => $req->mobile,
            'gender' => $req->gender,
            'role' => $req->role,
            'updated_at' => now(),
        ];

        // Hash and update password if provided
        if (!empty($req->password)) {
            $updateData['password'] = bcrypt($req->password);
        }

        // Handle file upload for image
        if ($req->hasFile('image')) {
            // Delete old image if it exists
            if (!empty($user->image) && file_exists(public_path('uploads/' . $user->image))) {
                unlink(public_path('uploads/' . $user->image));
            }

            // Save new image
            $fileName = time() . '.' . $req->image->extension();
            $req->image->move(public_path('uploads'), $fileName);
            $updateData['image'] = $fileName;
        }

        // Perform the update and redirect
        $updateUser = DB::table('tbl_user')->where('id', $req->id)->update($updateData);

        return $updateUser
            ? redirect()->route('user')->with('success', 'User updated successfully!')
            : redirect()->back()->with('error', 'Error updating user.');
    }



    public function viewUser(String $id)
    {
        $user = DB::table('tbl_user')->where('id', $id)->get();
        return view('Admin.users.viewuser', ['data' => $user]);
    }

    public function deleteUser(String $id)
    {
        $delete  = DB::table('tbl_user')->where('id', $id)->delete();
        if ($delete) {
            return redirect()->route('user');
        } else {
            return 'An Error Occurd';
        }
    }
    // Product Crud

    public function showProduct()
    {
        $productData = DB::table('tbl_products')
            ->join('categories', 'tbl_products.category_id', '=', 'categories.id') // Changed 'categories_id' to 'category_id'
            ->select('tbl_products.*', 'categories.name as category_name')
            ->get();
        return view('Admin.product.products', ['products' => $productData]);
    }

    public function addproduct()
    {
        $categories = DB::table('categories')->get();

        function generateProductCode()
        {
            $existingCodes = DB::table('tbl_products')->pluck('product_code')->toArray();
            $productCode = rand(10, 99);
            while (in_array($productCode, $existingCodes)) {
                $productCode = rand(10, 99);
            }
            return $productCode;
        }
        $code =  generateProductCode();
        return view('Admin.product.addproduct', ["categories" => $categories, 'code' => $code]);
    }

    public function saveProduct(Request $req)
    {
        // Validate incoming request
        $req->validate([
            'product_code' => 'required|unique:tbl_products,product_code',
            'product_image' => 'required|mimes:jpg,jpeg,png,webp|max:3000', // Changed 'file' to 'product_image'
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id', // Make sure the category exists
        ]);

        // Handle file upload
        if ($req->hasFile('product_image')) {
            $fileName = time() . '.' . $req->product_image->extension(); // Use 'product_image' instead of 'file'
            $req->product_image->move(public_path('uploads'), $fileName);
        }

        // Insert product into database
        $product = DB::table('tbl_products')->insert([
            'product_code' => $req->product_code,
            'product_image' => $fileName,
            'product_name' => $req->product_name,
            'description' => $req->description,
            'price' => $req->price,
            'stock' => $req->stock,
            'category_id' => $req->category_id, // Fixed column name from 'categories_id' to 'category_id'
            'created_at' => now(),
        ]);

        if ($product) {
            return redirect()->route('products')->with('success', 'Product added successfully!');
        } else {
            return redirect()->back()->withErrors(['msg' => 'Error occurred while saving the product.']);
        }
    }

    public function editproducts(string $id)
    {
        $productData = DB::table('tbl_products')->where('id', $id)->first(); // Use 'first()' for a single record
        if (!$productData) {
            return redirect()->route('products')->withErrors(['msg' => 'Product not found.']);
        }

        $categories = DB::table('categories')->get(); // Get categories for the edit form
        return view('Admin.product.updateproduct', ["product" => $productData, "categories" => $categories]);
    }


    public function updateproduct(Request $req)
    {
        // Validate the incoming request
        $req->validate([
            'product_code' => 'required|unique:tbl_products,product_code,' . $req->id, // Ensure unique except for the current product
            'file' => 'nullable|mimes:jpg,jpeg,png,webp|max:3000', // Update this to match your input name
            'product_name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Find the product by ID
        $productData = DB::table('tbl_products')->where('id', $req->id)->first();

        // Handle image upload if a new one is provided
        if ($req->hasFile('file')) { // Adjusted to match your form input name
            // Upload new image
            $fileName = time() . '.' . $req->file('file')->extension();
            $req->file('file')->move(public_path('uploads'), $fileName);
        } else {
            // Keep the old image name
            $fileName = $productData->product_image;
        }

        // Update the product
        DB::table('tbl_products')->where('id', $req->id)->update([
            'product_code' => $req->product_code,
            'product_image' => $fileName,
            'product_name' => $req->product_name,
            'description' => $req->description,
            'price' => $req->price,
            'stock' => $req->stock,
            'category_id' => $req->category_id,
            'updated_at' => now(),
        ]);

        return redirect()->route('products')->with('success', 'Product updated successfully');
    }




    public function viewProduct(string $id)
    {
        $product = DB::table('tbl_products')->where('id', $id)->first(); // Use 'first()' for single record
        if (!$product) {
            return redirect()->route('products')->withErrors(['msg' => 'Product not found.']);
        }

        return view('Admin.product.viewproduct', ['product' => $product]);
    }

    public function seeProduct(string $id)
    {
        $product = DB::table('tbl_products')->where('id', $id)->first();
        if (!$product) {
            return redirect()->route('products')->withErrors(['msg' => 'Product not found.']);
        }

        return view('user.shop-details', ['product' => $product]);
    }





    public function seeHome(Request $request)
    {
        // Get a random set of 8 products
        $products = DB::table('tbl_products')->inRandomOrder()->limit(8)->get();

        // Return the view with the products
        return view('user.index', ['products' => $products]);
    }


    public function deleteProduct(string $id)
    {
        $delete = DB::table('tbl_products')->where('id', $id)->delete();
        if ($delete) {
            return redirect()->route('products')->with('success', 'Product deleted successfully!');
        } else {
            return redirect()->back()->withErrors(['msg' => 'An error occurred while deleting the product.']);
        }
    }


    // Categories CRUD

    public function showCategory()
    {
        // Retrieve all categories from the database
        $categoryData = DB::table('categories')->get();
        return view('Admin.category.category', ["categories" => $categoryData]);
    }

    public function saveCategory(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|mimes:jpg,jpeg,png,webp,avif|max:3000',
        ]);

        // Handle the file upload if an image is provided
        $fileName = null;
        if ($req->hasFile('image')) {
            $fileName = time() . '.' . $req->image->extension();
            $req->image->move(public_path('uploads/categories'), $fileName);
        }

        // Insert the new category into the database
        $category = DB::table('categories')->insert([
            'name' => $req->name,
            'image' => $fileName,
            'created_at' => now(),
        ]);

        // Redirect to the category list if the save was successful
        if ($category) {
            return redirect()->route('category');
        } else {
            return 'Error';
        }
    }

    public function editCategory(String $id)
    {
        // Retrieve the category data for the specified ID
        $categoryData = DB::table('categories')->where('id', $id)->first();

        // Check if category exists
        if (!$categoryData) {
            return redirect()->route('category')->with('error', 'Category not found.');
        }

        return view('Admin.category.updatecategory', ["category" => $categoryData]);
    }

    public function showUpdateForm($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();

        if (!$category) {
            return redirect()->route('category')->with('error', 'Category not found.');
        }

        return view('Admin.category.update', ['category' => $category]);
    }

    // Method to handle the update request
    public function updateCategory(Request $req, $id)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp,avif|max:3000', // Allow image to be optional
        ]);

        // Get the current image name if not uploading a new image
        $fileName = DB::table('categories')->where('id', $id)->value('image');

        // If a new image is uploaded, update the image field
        if ($req->hasFile('image')) {
            $fileName = time() . '.' . $req->image->extension();
            $req->image->move(public_path('uploads/categories'), $fileName);
        }

        // Update the category data in the database
        $updateCategory = DB::table('categories')->where('id', $id)->update([
            'name' => $req->name,
            'image' => $fileName, // Update with new or existing image path
            'updated_at' => now(),
        ]);

        // Redirect to the category list if the update was successful
        if ($updateCategory) {
            return redirect()->route('category'); // Redirect to the categories page
        } else {
            return 'Error';
        }
    }


    public function viewCategory(String $id)
    {
        // Retrieve the category data for the specified ID
        $categoryData = DB::table('categories')->where('id', $id)->get();
        // return $categoryData;
        return view('Admin.category.viewcategory', ['products' => $categoryData]);
    }


    public function deleteCategory(String $id)
    {
        // Attempt to delete the category from the database
        $delete = DB::table('categories')->where('id', $id)->delete();

        // Redirect based on success of deletion
        if ($delete) {
            return redirect()->route('category'); // Redirect to the categories page
        } else {
            return 'An Error Occurred';
        }
    }



    // In your Controller (e.g., ProductController)





    public function filterProducts(Request $request)
    {
        // Initialize the product query using the DB facade
        $query = DB::table('tbl_products');

        // Apply category filters if selected
        if ($request->has('filters')) {
            $query->whereIn('category_id', $request->filters);
        }

        // Apply search query if provided
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Get the filtered products
        $products = $query->get();

        // Return the filtered products to the view
        return view('user.index', ['products' => $products]);
    }



    public function addToCart(Request $request, $id)
    {
        // Session::flush();
        // exit;

        $product = DB::table('tbl_products')->where('id', $id)->first(); // Get the product by ID

        // Check if the product exists
        if ($product) {
            $cart = session()->get('cart', []);
            $quantity = $request->input('quantity'); // Use input() method to get quantity

            // Check if the product is already in the cart
            if (isset($cart[$id])) {
                // If it is, just update the quantity
                $cart[$id]['quantity'] += $quantity;
            } else {
                // If not, add the product to the cart
                $cart[$id] = [
                    'id' => $product->id,
                    'name' => $product->product_name,
                    'price' => $product->price,
                    'image' => $product->product_image,
                    'quantity' => $quantity, // Store the quantity
                ];
            }

            session()->put('cart', $cart); // Store the cart back in the session

            // Set a session variable to indicate that an item has been added
            session()->flash('success', 'Product added to cart successfully!');
        }

        return redirect()->back();
    }
    public function updateCart(Request $request)
    {
        // Retrieve the cart from the session
        $cart = session('cart', []);

        // Check if the product exists in the cart
        if (isset($cart[$request->product_id])) {
            // Update the quantity
            $cart[$request->product_id]['quantity'] = $request->quantity;

            // Save the updated cart back to the session
            session(['cart' => $cart]);
        }

        // Return a response (you can customize this)
        return response()->json(['success' => true, 'cart' => $cart]);
    }

    // CartController.php
    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return view('user.shopping-cart');
    }



    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Auto-login after registration
        Auth::attempt($request->only('email', 'password'));

        return redirect()->intended('checkout');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 0) {
                return redirect('/adminn');
            } else if (Auth::user()->role == 1) {
                return redirect()->route('/');
            } else {
                return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
            }
        }
        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function showOrder()
    {

        $orderData = DB::table('orders')->get();
        // return $orderData;
        // exit;
        return view('Admin.order.order', ["data" => $orderData]);
    }


    public function saveOrder(Request $req)
    {
        // Check if the user exists
        $user = Auth::user();

        if (!$user) {
            // Redirect if user is not authenticated
            return redirect()->route('login');
        }

        // Insert order data and retrieve the inserted order ID
        $orderId = DB::table('orders')->insertGetId(
            [
                'user_id' => $req->user_id,
                'customer_name' => $req->customer_name,
                'email' => $req->email,
                'phone' => $req->phone,
                'address' => $req->address,
                'quantity' => $req->quantity,
                'total_amount' => $req->total_amount,
                'delivery_type' => $req->delivery_type,
                'payment_status' => $req->payment_status,
                'account_number' => $req->account_number,
                'created_at' => now(),
            ]
        );

        if ($orderId) {
            // Retrieve cart items from session
            $cartItems = session('cart');

            if ($cartItems && is_array($cartItems)) {
                foreach ($cartItems as $item) {
                    DB::table('order_items')->insert(
                        [
                            'order_id' => $orderId, // Link to the inserted order
                            'product_id' => $item['id'], // Product ID
                            'quantity' => $item['quantity'], // Quantity of the product
                            'price' => $item['price'], // Price per unit
                            'created_at' => now(),
                        ]
                    );
                }
            }

            // Clear the cart after order is saved
            session()->forget('cart');

            // Redirect after saving
            return redirect()->route('/');
        } else {
            return 'Error'; // Return error message if order insertion fails
        }
    }

    public function editOrder($id)
    {
        // Retrieve the order by its ID
        $order = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('tbl_products', 'order_items.product_id', '=', 'tbl_products.id')
            ->where('orders.id', $id)
            ->get();
        // return $order[0]->order_id;
        // exit;
        // Check if order exists
        if (!$order) {
            return redirect()->route('order')->with('error', 'Order not found.');
        }

        // Pass the $order to the view
        return view('Admin.order.updateorder', ['data' => $order]);
    }

    public function updateOrder(Request $req)
    {
        // Retrieve the existing order record
        $order = DB::table('orders')->where('id', $req->id)->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        // Prepare data for updating
        $updateData = [
            'order_status' => $req->order_status,
            'updated_at' => now(),
        ];

        // Perform the update
        $updatedOrder = DB::table('orders')->where('id', $req->id)->update($updateData);

        return $updatedOrder
            ? redirect()->route('order')->with('success', 'Order updated successfully!')
            : redirect()->back()->with('error', 'Error updating order.');
    }



    public function viewOrder(String $id)
    {
        $order = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('tbl_products', 'order_items.product_id', '=', 'tbl_products.id')
            ->where('orders.id', $id)
            ->select(
                'orders.*',
                'order_items.quantity as item_quantity',
                'order_items.price as item_price',
                'tbl_products.product_name',
                'tbl_products.product_image',
                'tbl_products.description'
            )
            ->get();

        // Pass the data to the view
        return view('Admin.order.detailorder', ['orderItems' => $order]);
    }



    public function viewfrontorder(String $id)
    {
        $order = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('tbl_products', 'order_items.product_id', '=', 'tbl_products.id')
            ->where('orders.id', $id)
            ->select(
                'orders.*',
                'order_items.quantity as item_quantity',
                'order_items.price as item_price',
                'tbl_products.product_name',
                'tbl_products.product_image',
                'tbl_products.description'
            )
            ->get();

        // Pass the data to the view
        return view('user.viewfrontorder', ['orderItems' => $order]);
    }



    public function storeUser(Request $req)
    {
        // $req->validate([
        //     'file' => 'required|mimes:jpg,jpeg,png,webp|max:3000',
        // ]);

        // $fileName = time() . '.' . $req->file->extension();
        // $req->file->move(public_path('uploads'), $fileName);

        $person = DB::table('tbl_user')->insert(
            [
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'mobile' => $req->mobile,
                'gender' => $req->gender,
                'role' => 2,
                // 'image' =>  $fileName,
                'created_at' => now(),
            ]
        );

        if ($person) {
            // return 'Data Saved';

            // return '<script>window.location.href="/"</script>';
            return redirect()->route('/');
        } else {
            return 'Error';
        }
    }




    public function frontshowOrder()
    {

        if (Auth::user() && Auth::user()->role == 1) {
            $userId = Auth::user()->id;
            $orderData =  DB::table('orders')->where('user_id', $userId)->get();
            // return $orderData;
            // exit;
            return view('user.frontorder', ["data" => $orderData]);
        } else {
            return redirect('/login');
        }
    }




    public function store(Request $request)
    {
        $orderId = $request->input('order_id');
        $feedbackData = $request->input('feedback');
        $ratingData = $request->input('rating');

        $feedbacks = [];
        foreach ($feedbackData as $productId => $feedback) {
            $feedbacks[] = [
                'order_id' => $orderId,
                'product_id' => $productId,
                'feedback' => $feedback,
                'rating' => $ratingData[$productId],
                'created_at' => now(),
            ];
        }

        // Insert feedbacks into the database
        DB::table('feedbacks')->insert($feedbacks);

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }


    public function showFeedbackForOrder($orderId)
    {
        // Fetch the order details
        $order = DB::table('orders')->find($orderId);

        // If order is not found, redirect with an error message
        if (!$order) {
            return redirect()->route('orders.index')->with('error', 'Order not found.');
        }

        // Fetch feedback related to this order
        $feedbacks = DB::table('feedbacks')
            ->where('order_id', $orderId)
            ->get();


        // Return the view with order details and feedback
        return view('feedback.show', [
            'order' => $order, // Pass order as 'order'
            'feedbacks' => $feedbacks,
        ]);
    }


    public function show($id)
    {
        // Fetch the current product details
        $product = DB::table('tbl_products')->where('id', $id)->first();

        if (!$product) {
            abort(404, 'Product not found');
        }

        // Fetch related products from the same category
        $relatedProducts = DB::table('tbl_products')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $id) // Exclude the current product
            ->limit(4) // Limit the number of related products
            ->get();

        return view('shop-details', compact('product', 'relatedProducts'));
    }



    public function seeShop(Request $request)
    {
        // Get a random set of 8 products
        $products = DB::table('tbl_products')->inRandomOrder()->limit(16)->get();

        // Return the view with the products
        return view('user.shop-grid', ['products' => $products]);
    }




    public function filterProduct($id)
{
    if (!$id) {
        return response()->json(['error' => 'Category ID is required'], 400);
    }

    // Fetch products by category ID
    $products = DB::table('tbl_products')->where('category_id', $id)->get();

    // If no products, return an empty response
    if ($products->isEmpty()) {
        return response()->json(['html' => '<p>No products found for this category.</p>']);
    }

    // Render product cards using the partial view
    $html = view('partials.filtered-products', compact('products'))->render();

    return response()->json(['html' => $html]);
}


}
