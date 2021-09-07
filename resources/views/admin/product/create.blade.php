@php
    const EMPTY_STRING = '';
    if(isset($product)){
        $productCategory=$product->category;
        $slug = $product->slug;
        $name = $product->name;
        $description = $product->description;
        $specification = $product->specification;
        $price = $product->price;
        $pageName = 'Update Product '.$product->name;
        $action = '/admin/product/'.$product->id.'/update';
        $buttonWord = 'Update';
    } else{
        $productCategory=EMPTY_STRING;
        $slug = EMPTY_STRING;
        $name = EMPTY_STRING;
        $description = EMPTY_STRING;
        $specification = EMPTY_STRING;
        $price = EMPTY_STRING;
        $pageName = 'Create Product';
        $action = '/admin/product/store';
        $buttonWord = 'Create';
    }
@endphp

<x-layout>
    <x-start-banner header="Admin Panel" :pageName="$pageName"/>
    <div class="container mt-5">

        <h3 class="text-center">{{$pageName}}</h3>

        @if(isset($product))
            <div class="text-center mt-5">
                <x-link-button href="/admin/product/{{$product->id}}/specification/edit" class="col-md-4">
                    Proceed to Specifications
                </x-link-button>
            </div>

        @else
            <h4 class="text-center mt-3">You can add specification and edit product slug after creating product in its edit page</h4>
        @endif


        <form method="POST" action="{{$action}}" class="row login_form mt-5 " style="margin-left: 440px">

            @csrf
            <x-admin-input-field name="Category">

                <select
                    id="category_id"
                    name="category_id"
                >
                    @foreach($categories as $category)
                        <div>
                            <option
                                value="{{$category->id}}" {{(isset($productCategory->id) and $category->id == $productCategory->id) ? 'selected' : ''}}>{{$category->name}}</option>
                        </div>
                    @endforeach
                </select>
            </x-admin-input-field>
            <x-error :id="'category_id'"/>

            @if(isset($product))
                <x-admin-input-field name="Slug">
                    <input
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
                    type="text"
                    id="name"
                    name="name"
                    value="{{$name}}"
                >
            </x-admin-input-field>
            <x-error :id="'name'"/>


            <x-admin-input-field name="description">
                <textarea class="input"
                          id="description"
                          name="description"
                          required
                >{{$description}}</textarea>
            </x-admin-input-field>
            <x-error :id="'description'"/>

            <x-admin-input-field name="Price ($)">
                <input
                    type="number"
                    id="price"
                    name="price"
                    value="{{$price}}"
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


