@props(['products'])

<section class="lattest-product-area pb-40 category-list">
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-6 col-lg-4">
            <x-product-grid-item
                :product="$product"
            />
        </div>
        @endforeach
    </div>
</section>
