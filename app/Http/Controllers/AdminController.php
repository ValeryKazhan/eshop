<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('admin.orders');
    }

    public function products(){
        return view('admin.products');
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
