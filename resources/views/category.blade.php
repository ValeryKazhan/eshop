<x-layout :title="$currentCategory->name">

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

        </x-slot>

        {{$products->withQueryString()->links()}}
    </x-category-section>

   <x-subscribe-panel/>

</x-layout>

