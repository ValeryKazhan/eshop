<x-layout>

    <x-start-banner
        :header="$currentCategory->name"
        :pageName="'Shop Category'"
    />

    <x-category-section>

        <x-filter-bar/>
        <x-products-grid-three
            :products="$products"
        />

        <x-slot name="sidebar">
            <x-sidebar-categories :categories="$categories"/>
{{--            <x-sidebar-filter/>--}}
        </x-slot>

    </x-category-section>

    <x-products-related-grid/>

   <x-subscribe-panel/>

</x-layout>

