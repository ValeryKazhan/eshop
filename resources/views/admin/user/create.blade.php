@php
    const EMPTY_STRING = '';
    if(isset($user)){
        $username=$user->username;
        $name = $user->name;
        $email = $user->email;
        $isAdmin = $user->is_admin;
        $pageName = 'Update User '.$user->username;
        $action = '/admin/user/'.$user->id.'/update';
        $buttonWord = 'Update';
    } else{
        $username= EMPTY_STRING;
        $name = EMPTY_STRING;
        $email = EMPTY_STRING;
        $isAdmin = false;
        $pageName = 'Create User';
        $action = '/admin/user/store';
        $buttonWord = 'Create';
    }
@endphp

<x-layout :title="'Admin Panel'">
    <x-start-banner header="Admin Panel" :pageName="$pageName"/>
    <div class="container mt-5">

        <h3 class="text-center">{{$pageName}}</h3>
        <form method="POST" action="{{$action}}" class="row login_form mt-5 justify-content-center">

            @csrf

            <x-admin-input-field name="Username">
                <input
                    class="input-group"
                    type="text"
                    id="username"
                    name="username"
                    value="{{$username}}"
                >
            </x-admin-input-field>
            <x-error :id="'username'"/>


            <x-admin-input-field name="Name">
                <input
                    class="input-group"
                    type="text"
                    id="name"
                    name="name"
                    value="{{$name}}"
                >
            </x-admin-input-field>
            <x-error :id="'name'"/>

            <x-admin-input-field name="Email">
                <input
                    class="input-group"
                    type="email"
                    id="email"
                    name="email"
                    value="{{$email}}"
                >
            </x-admin-input-field>
            <x-error :id="'email'"/>

            @if(!isset($user))
                <x-admin-input-field name="Password">
                    <input
                        class="input-group"
                        type="password"
                        id="password"
                        name="password"
                    >
                </x-admin-input-field>
                <x-error :id="'password'"/>
            @endif

            <div class="col-md-12 ml-3 mt-2">
                <x-admin-input-checkbox name="is_admin" id="is_admin" :is_admin="$isAdmin"/>
            </div>
            <div class="col-md-4 form-group text-center mt-3">
                <button type="submit" class="button button-register w-100">{{$buttonWord}}</button>
                <x-errors/>
            </div>
        </form>

    </div>

</x-layout>


