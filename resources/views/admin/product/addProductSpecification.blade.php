<x-layout title="Admin Panel">
    <x-start-banner header="Admin Panel" pageName="Edit Specification of product {{$product->id}}"/>
    <div class="container mt-5">

        <h3 class="text-center mb-4">Specification of Product №{{$product->id}}</h3>
        <form method="POST" class="text-center mb-4" action="/admin/product/{{$product->id}}/specification/add">
            @csrf

            <span>Key</span><input id="key" name="key">
            <span>Value</span><input id="value" name="value">
            <br>
            <x-submit-button class="mt-4 col-md-3">
                Add
            </x-submit-button>
        </form>



    </div>

</x-layout>


