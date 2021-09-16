<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use App\Models\Utils;
use Hamcrest\Util;
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
        return view('admin.categories', [
            'categories' => Category::paginate(self::ITEMS_PER_PAGE)
        ]);
    }

    public function createCategory(){
        return view('admin.category.create', [
            'categories' => Category::all()
        ]);
    }

    public function storeCategory(Request $request){
        Utils::backIfNoRequest();
        $attributes = $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        $attributes['slug'] = Str::slug($attributes['name']);

        Category::create($attributes);
        return redirect('/admin/categories');
    }

    public function editCategory(Category $category){
        return view('admin.category.create', [
            'category' => $category
        ]);
    }

    public function updateCategory(Category $category, Request $request){
        Utils::backIfNoRequest();
        $attributes = $request->validate([
            'slug' => ['required', Rule::unique('categories', 'slug')->ignore($category->id)],
            'name' => ['required', 'max:255']
        ]);
        $category->update($attributes);
        return redirect('/admin/categories');
    }

    public function destroyCategory(Category $category){
        $category->delete();
        return redirect('/admin/categories');
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

    public function order (Order $order){
        return view ('order', [
            'order' => $order
        ]);
    }

    public function editOrder(Order $order){
        return view('admin.order.create', [
            'order' => $order,
            'users' => User::all()
        ]);
    }

    public function updateOrder(Order $order, Request $request){

        Utils::backIfNoRequest();
        $attributes = $request->validate([
            'user_id' => [Rule::exists('users', 'id')],
            'is_delivered' => ['required', 'boolean']
        ]);

        $attributes['contacts'] = $request->validate([
            'country' => ['required', 'max:50', 'min:2'],
            'region' => ['max:255'],
            'locality' => ['required', 'max:50', 'min:2'],
            'street' => ['required', 'max:50', 'min:2'],
            'house' => ['required', 'digits_between:1,3'],
            'index' => ['required', 'digits:6'],
            'phone' => ['required','digits_between:5,15']
        ]);
        $order->update($attributes);
        return redirect('/admin/orders');
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

    public function storeProduct(Request $request){

        $attributes = $request->validate([
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

    public function updateProduct(Product $product, Request $request){

        Utils::backIfNoRequest();
        $attributes = $request->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'slug' => ['required', Rule::unique('products', 'slug')->ignore($product->id)],
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'price' => ['required', 'digits_between:1,10', Rule::notIn(0)]
        ]);
        $product->update($attributes);
        return redirect('/admin/products');
    }

    public function destroyProduct(Product $product){
        $product->delete();
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

    public function storeProductSpecification(Product $product, Request $request){
        Utils::backIfNoRequest();
        $attributes = $request->validate([
           'key' => ['required', Rule::notIn($product->specification)],
            'value' => ['required']
        ]);
        $product->addSpecification($attributes['key'], $attributes['value']);
        return redirect('/admin/product/'.$product->id.'/specification/edit');
    }



    public function comments(){
        return view ('admin.comments', [
            'comments' => Comment::paginate(self::ITEMS_PER_PAGE)
        ]);
    }

    public function productComments(Product $product){
        return view ('admin.comments', [
            'comments' => Comment::where('product_id', $product->id)->paginate(self::ITEMS_PER_PAGE),
            'product' => $product
        ]);
    }

    public function userComments(User $user){
        return view ('admin.comments', [
            'comments' => Comment::where('user_id', $user->id)->paginate(self::ITEMS_PER_PAGE),
            'user' => $user
        ]);
    }

    public function editComment(Comment $comment){
        return view('admin.comment.edit', [
            'comment' => $comment,
            'products' => Product::all(),
            'users' => User::all()
        ]);
    }

    public function updateComment(Comment $comment, Request $request){
        Utils::backIfNoRequest();
        $attributes = $request->validate([
            'user_id' => ['required', Rule::exists('users', 'id')],
            'product_id' => ['required', Rule::exists('products', 'id')],
            'body' => ['required']
        ]);
        $comment->update($attributes);
        return redirect('/admin/comments');
    }

    public function destroyComment(Comment $comment){
        $comment->delete();
        return redirect('/admin/comments');
    }


    public function reviews(){
        return view('admin.reviews', [
            'reviews' => Review::paginate(self::ITEMS_PER_PAGE)
        ]);
    }

    public function productReviews(Product $product){
        return view ('admin.reviews', [
            'reviews' => Review::where('product_id', $product->id)->paginate(self::ITEMS_PER_PAGE),
            'product' => $product
        ]);
    }

    public function userReviews(User $user){
        return view ('admin.reviews', [
            'reviews' => Review::where('user_id', $user->id)->paginate(self::ITEMS_PER_PAGE),
            'user' => $user
        ]);
    }

    public function editReview(Review $review){
        return view('admin.review.edit', [
            'review' => $review,
            'products' => Product::all(),
            'users' => User::all()
        ]);
    }

    public function updateReview(Review $review, Request $request){

        Utils::backIfNoRequest();
        $attributes = $request->validate([
            'user_id' => ['required', Rule::exists('users', 'id')],
            'product_id' => ['required', Rule::exists('products', 'id')],
            'rating' => [Rule::in([1,2,3,4,5])],
            'body' => ['required']
        ]);
        $review->update($attributes);
        return redirect('/admin/reviews');
    }

    public function destroyReview(Review $review){
        $review->delete();
        return redirect('/admin/reviews');
    }



    public function users(){
        return view('admin.users', [
            'users' => User::query()->paginate(self::ITEMS_PER_PAGE)
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
