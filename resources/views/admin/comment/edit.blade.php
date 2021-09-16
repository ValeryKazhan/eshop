@php

        $pageName = 'Update comment '.$comment->id;
        $action = '/admin/comment/'.$comment->id.'/update';
        $buttonWord = 'Update';

@endphp

<x-layout title="Admin Panel">
    <x-start-banner header="Admin Panel" :pageName="$pageName"/>
    <div class="container mt-5">

        <h3 class="text-center">{{$pageName}}</h3>

        <form method="POST" action="{{$action}}" class="row login_form mt-5 ">

            @csrf
            <x-admin-input-field :name="'Product'">
                <select
                    id="product_id"
                    name="product_id"
                >
                    @foreach($products as $product)
                        <div>
                            <option
                                value="{{$product->id}}" {{($product->id == $comment->product->id) ? 'selected' : ''}}>{{$product->name}}</option>
                        </div>
                    @endforeach
                </select>
            </x-admin-input-field>

            <x-admin-input-field :name="'User'">
                <select
                    id="user_id"
                    name="user_id"
                >
                    @foreach($users as $user)
                        <div>
                            <option
                                value="{{$user->id}}" {{($user->id === $comment->author->id) ? 'selected' : ''}}>{{$user->name}}</option>
                        </div>
                    @endforeach
                </select>
            </x-admin-input-field>


            <x-admin-input-field name="Body">
                <textarea
                    class="input-group"
                    type="text"
                    id="body"
                    name="body"
                    rows="6"
                >{{$comment->body}}</textarea>

            </x-admin-input-field>
            <x-error :id="'body'"/>

            <div class="col-md-4 form-group text-center mt-3">
                <button type="submit" class="button button-register w-100">{{$buttonWord}}</button>
                <x-errors/>
            </div>
        </form>

    </div>

</x-layout>


