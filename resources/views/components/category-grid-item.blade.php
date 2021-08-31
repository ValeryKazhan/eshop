@props(['category'])
<div class="card text-center card-product">
    <div class="card-product__img">
        <a href="/category/{{$category->slug}}">
            <img class="card-img" src="/img/product/product1.png" alt="">
        </a>

{{--        <ul class="card-product__imgOverlay">--}}
{{--            <li><button><i class="ti-search"></i></button></li>--}}
{{--            <li><button><i class="ti-shopping-cart"></i></button></li>--}}
{{--            <li><button><i class="ti-heart"></i></button></li>--}}
{{--        </ul>--}}
    </div>
    <div class="card-body">
{{--        <p>{{$category->name}}</p>--}}
        <h4 class="card-product__title"><a href="/category/{{$category->slug}}">{{ucwords($category->name).'('.count($category->products).')'}}</a></h4>
{{--        <p class="card-product__price">${{$product->price}}</p>--}}
    </div>
</div>

