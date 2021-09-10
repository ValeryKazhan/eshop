@php
    const NO = 'No ';
    $categoriesName='Categories Found';
    $productsName='Products Found';
    if(count($categories) == 0)
        $categoriesName = NO.$categoriesName;
    if(count($products) == 0)
        $productsName = NO.$productsName;
@endphp

<x-layout title="Search">
    <h3 class="text-center" style="margin-top: 100px">
        Searching "{{request('search')}}"...
    </h3>


    <x-categories-grid-four
        :name="$categoriesName"
        :categories="$categories"
    />

    <x-products-grid-four
        :name="$productsName"
        :products="$products"
    />
</x-layout>
