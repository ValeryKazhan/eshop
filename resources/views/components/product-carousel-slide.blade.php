@props(['product'])

<div class="hero-carousel__slide">
    <div
        class="single-product-image-container"
        style="background-image: url('{{$product->images[0]}}');"
    ></div>
{{--    <img src="{{$product->images[0]}}" alt="" class="img-fluid">--}}
    <a href="/product/{{$product->slug}}" class="hero-carousel__slideOverlay">
        <h3>{{ucwords($product->name)}}</h3>
        <p>
             Category: {{ucwords($product->category->name)}}
        </p>
    </a>
</div>
