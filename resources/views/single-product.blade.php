<x-layout :title="$product->name">

   <x-start-banner pageName="Product Page" :header="$product->name"/>

    <x-single-product-card
        :product="$product"
    />

    <x-single-product-description
        :product="$product"
    />


</x-layout>

