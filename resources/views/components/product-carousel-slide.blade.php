@props(['product'])

<div class="hero-carousel__slide">
    <img src="/img/home/hero-slide1.png" alt="" class="img-fluid">
    <a href="/product/{{$product->slug}}" class="hero-carousel__slideOverlay">
        <h3>{{ucwords($product->name)}}</h3>
        <p>
             Category: {{ucwords($product->category->name)}}
        </p>
    </a>
</div>
