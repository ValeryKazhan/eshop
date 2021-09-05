<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use App\Models\Product;

class UserController extends Controller
{
    public function create()
    {
        return view('user.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'max:255', 'min:7']
        ]);
        $attributes[ 'email_verified_at'] = now();

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created.');  //session()->flash('success', 'Your account has been created.');

    }

    public function addToWishlist(Product $product){
        auth()->user()->addToWishlist($product);
        return back();
    }

    public function removeFromWishlist(Product $product){
        auth()->user()->removeFromWishlist($product);
        return back();
    }

}
