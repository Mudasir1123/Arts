<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Nette\Utils\Strings;

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
                'password' => $req->password,
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
        return view('Admin.product.addproduct', ["categories" => $categories]);
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
        'image' => 'nullable|mimes:jpg,jpeg,png,webp|max:3000', // Allow image to be optional
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
  return view('Admin.category.viewcategory',['products'=>$categoryData]);
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
}
