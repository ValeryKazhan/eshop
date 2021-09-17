@props(['category'])
<div class="card text-center card-product">
    <div class="card-product__img">
        <a href="/category/{{$category->slug}}">
            <x-image-container :image="$category->image"/>
{{--            <img class="card-img" src="{{$category->image}}" alt="">--}}
        </a>
    </div>
    <div class="card-body">
        <h4 class="card-product__title"><a href="/category/{{$category->slug}}">{{$category->name.'('.count($category->products).')'}}</a></h4>
    </div>
</div>

