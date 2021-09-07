<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function menu(){
        return view('admin.menu');
    }

    public function categories(){
        return view('admin.categories');
    }




    public function orders(){
        return view('admin.orders', [
            'orders' => Order::all()
        ]);
    }

    public function products(){
        return view('admin.products', [
            'products' => Product::with('category')->get()
        ]);
    }
    public function categoryProducts(Category $category){
        return view ('admin.products', [
            'products' => $category->products,
            'category' => $category
        ]);
    }

    public function createProduct(){
        return view('admin.product.create', [
            'categories' => Category::all()
        ]);
    }

    public function storeProduct(){

        $attributes = request()->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'price' => ['required', 'digits_between:1,10', Rule::notIn(0)]
        ]);

        $attributes['slug'] = Str::slug($attributes['name']);

        Product::create($attributes);
        return redirect('/admin/products');
    }

    public function editProduct(Product $product){
        return view('admin.product.create', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    public function updateProduct($id){

        $attributes = request()->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'slug' => ['required', Rule::unique('products', 'slug')->ignore($id)],
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'price' => ['required', 'digits_between:1,10', Rule::notIn(0)]
        ]);

        DB::table('products')->where('id', '=', $id)->update($attributes);
        return redirect('/admin/products');
    }

    public function destroyProduct($id){
        DB::table('products')->where('id', '=', $id)->delete();
        return redirect('/admin/products');
    }

    public function editProductSpecification(Product $product){
        return view('admin.product.editProductSpecification', [
            'product' => $product
        ]);
    }



    public function comments(){
        return view ('admin.comments');
    }

    public function reviews(){
        return view('admin.reviews');
    }



    public function users(){
        return view('admin.users', [
            'users' => User::all()
        ]);
    }

    public function createUser(){
        return view('admin.user.create');
    }

    public function storeUser(){

        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'max:255', 'min:7']
        ]);
        $attributes[ 'email_verified_at'] = now();
        $attributes['is_admin'] = request('is_admin');

        User::create($attributes);
        return redirect('/admin/users');
    }

    public function editUser(User $user){
        return view('admin.user.create', [
            'user' => $user
        ]);
    }

    public function updateUser($id){
        $attributes = request()->validate([
            'name' => ['required','max:255'],
            'username'=> ['required','min:3','max:255', Rule::unique('users', 'username')->ignore($id)],
            'email' => ['required','email','max:255', Rule::unique('users', 'email')->ignore($id)]
        ]);
        $attributes['is_admin'] = request('is_admin');
        DB::table('users')->where('id', '=', $id)->update($attributes);
        return redirect('/admin/users');
    }

    public function destroyUser($id){
        DB::table('users')->where('id', '=', $id)->delete();
        return redirect('/admin/users');
    }
}
