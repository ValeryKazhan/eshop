<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    const ITEMS_PER_PAGE = 40;

    public function menu(){
        return view('admin.menu');
    }

    public function categories(){
        return view('admin.categories');
    }




    public function orders(){
        return view('admin.orders', [
            'orders' => Order::paginate(self::ITEMS_PER_PAGE)
        ]);
    }

    public function userOrders(User $user){
        return view ('admin.orders', [
            'user' => $user,
            'orders' => Order::where('user_id', $user->id)->paginate(self::ITEMS_PER_PAGE)
        ]);
    }

    public function createOrder(){
        return view('admin.order.create');
    }

    public function storeOrder(){

        return redirect('/admin/products');
    }

    public function editOrder(Order $order){
        return view('admin.order.create', [
            'order' => $order
        ]);
    }

    public function updateOrder($id){

        Utils::backIfNoRequest();

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

    public function destroyOrder($id){
        DB::table('products')->where('id', '=', $id)->delete();
        return redirect('/admin/products');
    }



    public function products(){
        return view('admin.products', [
            'products' => Product::with('category')->paginate(self::ITEMS_PER_PAGE)
        ]);
    }
    public function categoryProducts(Category $category){
        return view ('admin.products', [
            'products' => Product::where('category_id', $category->id)->paginate(self::ITEMS_PER_PAGE),
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

        Utils::backIfNoRequest();
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

    public function updateProductSpecification(Product $product){

            Utils::backIfNoRequest();
            $validationRules = ['required', 'max:5'];
            $validationArray = array();

            foreach ($product->specification as $key=>$value){
                $validationArray[$key] = $validationRules;
            }

            $attributes = \request()->validate($validationArray);
            $product->setSpecification($attributes);
            return redirect('/admin/product/'.$product->id.'/specification/edit');

    }

    public function addProductSpecification(Product $product){
        return view('admin.product.addProductSpecification', [
            'product' => $product
        ]);
    }

    public function removeProductSpecification(Product $product, $key){
        $product->removeSpecification($key);
        return back();
    }

    public function storeProductSpecification(Product $product){
        Utils::backIfNoRequest();
        $attributes = \request()->validate([
           'key' => ['required', Rule::notIn($product->specification)],
            'value' => ['required']
        ]);
        $product->addSpecification($attributes['key'], $attributes['value']);
        return redirect('/admin/product/'.$product->id.'/specification/edit');
    }



    public function comments(){
        return view ('admin.comments');
    }

    public function reviews(){
        return view('admin.reviews');
    }



    public function users(){
        return view('admin.users', [
            'users' => User::query()->paginate(40)
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
