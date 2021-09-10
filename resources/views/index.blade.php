<x-layout title="Home">
    <main class="site-main">

        <div class="section-intro pb-60px text-center mt-5">
            <h2><span class="section-intro__style">Our Best Sellers</span></h2>
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
        <div style="justify-content: center">
            {{$categories->links()}}
        </div>

        <x-subscribe-panel/>

    </main>
</x-layout>
