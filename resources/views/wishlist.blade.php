<x-layout>
    <x-start-banner :header="'Wishlist'" :pageName="'Wishlist'"/>
    @if(!$products)
        <h1 class="text-center mt-5">You have no items in your wishlist now</h1>

        <div class="text-center mt-5 mb-5">
            <x-order-link-button :href="'/'" :name="'GO SHOPPING'"/>
        </div>
    @else
    <x-products-grid-four :name="'My Wishlist'" :products="$products"/>
    @endif
{{--    <x-link-button href=""--}}
</x-layout>
