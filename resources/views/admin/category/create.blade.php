@php
    const EMPTY_STRING = '';
    if(isset($category)){
        $slug = $category->slug;
        $name = $category->name;
        $pageName = 'Update category '.$category->name;
        $action = '/admin/category/'.$category->id.'/update';
        $buttonWord = 'Update';
    } else{
        $slug = EMPTY_STRING;
        $name = EMPTY_STRING;
        $pageName = 'Create category';
        $action = '/admin/category/store';
        $buttonWord = 'Create';
    }
@endphp

<x-layout title="Admin Panel">
    <x-start-banner header="Admin Panel" :pageName="$pageName"/>
    <div class="container mt-5">

        <h3 class="text-center">{{$pageName}}</h3>

        <form method="POST" action="{{$action}}" class="row login_form mt-5 ">

            @csrf

            @if(isset($category))
            <x-admin-input-field name="Slug">
                <input
                    class="input-group"
                    type="text"
                    id="slug"
                    name="slug"
                    value="{{$slug}}"
                >
            </x-admin-input-field>
            <x-error :id="'slug'"/>
            @endif
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

            <div class="col-md-4 form-group text-center mt-3">
                <button type="submit" class="button button-register w-100">{{$buttonWord}}</button>
                <x-errors/>
            </div>
        </form>

    </div>

</x-layout>


