<x-layout>

   <x-single-product-banner/>

    <x-single-product-card
        :product="$product"
    />

    <x-single-product-description
        :product="$product"
    />

    <div class="section-margin--small mt-0">
        <x-products-related-grid/>
    </div>


</x-layout>

