<x-layout title="Admin Panel">
    <x-start-banner header="Admin Panel" pageName="Edit Specification of product {{$product->id}}"/>
    <div class="container mt-5 text-center">

        <h3>Specification of Product №{{$product->id}}</h3>

        <form method="POST" action="/admin/product/{{$product->id}}/specification/update">
            @csrf
            @foreach($product->specification as $key=>$value)
                <div class="mt-3">
                    <span>{{$key}}</span><input id="{{$key}}" name="{{$key}}" value="{{$value}}">
                    <x-link-button href="/admin/product/{{$product->id}}/specification/{{$key}}/remove">
                        Remove
                    </x-link-button>
                    <br>
                    <x-error id="{{$key}}"/>
                </div>

            @endforeach

            <x-submit-button class="col-md-3 mt-3">
                Update
            </x-submit-button>
        </form>
            <x-link-button class="ml-3 mt-2 mb-4 w-100 col-md-3" href="/admin/product/{{$product->id}}/specification/add">
                Add New Line
            </x-link-button>





    </div>

</x-layout>


