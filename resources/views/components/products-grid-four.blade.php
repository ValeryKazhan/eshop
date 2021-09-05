@props(['name' => 'Products', 'isWishlist' => false, 'products'])

<section class="section-margin calc-60px">
    <div class="container">
        <div class="section-intro pb-60px">
            <h2><span class="section-intro__style">{{$name}}</span></h2>
        </div>
        <div class="row">

            @foreach($products as $product)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <x-product-grid-item
                        :product="$product"
                    />
                </div>
            @endforeach

        </div>
    </div>
</section>
