<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create(){
        return view('user.login');
    }

    public function store(){

        $attributes = request()->validate([
            'email' => ['required', /*Rule::exists('users', 'email'),*/ 'email'],
            'password' => ['required']
        ]);

        if (auth()->attempt($attributes)){
            session()->regenerate();
            if(auth()->user()->is_admin)
                return redirect('/admin');
            return redirect('/')->with('success', 'Welcome Back');
        }


        throw ValidationException::withMessages([
            'email'=>'Your provided credentials could not be verified'
        ]);

//        return back()
//            ->withInput()
//            ->withErrors(['email' => 'Your provided credentials could not be verified.']);

    }

    public function destroy(){

        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');

    }
}
