<x-layout>
    <main class="site-main">

{{--        <x-product-banner/>--}}

        <div class="section-intro pb-60px text-center mt-5">
            <h2><span class="section-intro__style">Our Products</span></h2>
        </div>

        <x-carousel>


            @foreach($products as $product)
                <x-product-carousel-slide
                    :product="$product"
                />
            @endforeach
        </x-carousel>

        <x-categories-grid-four
            :categories="$categories"
        />

        <x-offer/>

{{--        <x-products-grid-four/>--}}

{{--        <x-blog-section/>--}}

        <x-subscribe-panel/>

    </main>
</x-layout>
