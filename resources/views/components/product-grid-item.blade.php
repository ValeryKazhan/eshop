@props(['product'])

<div class="card text-center card-product">
    <div class="card-product__img">
        <x-image-container :image="$product->images[0]"/>
        <ul class="card-product__imgOverlay">

            <li>
                <form method="POST" action="/cart/product/{{$product->slug}}/add">
                    @csrf
                    <input type="hidden" id="number" name="number" value="1">
                    <button type="submit"><i class="ti-shopping-cart"></i></button>
                </form>
            </li>

            @if(auth()->guest())
              <li>
                  <a href="/login"><button><i class="ti-heart"></i></button></a>
              </li>
            @elseif(!in_array($product->id, auth()->user()->wishlist))
            <li>
                <form method="POST" action="/wishlist/product/{{$product->slug}}/add">
                    @csrf
                    <button><i class="ti-heart"></i></button>
                </form>
            </li>
            @else
                <li>
                    <form method="POST" action="/wishlist/product/{{$product->slug}}/remove">
                        @csrf
                        <button><i class="ti-heart-broken"></i></button>
                    </form>
                </li>
            @endif

        </ul>
    </div>
    <div class="card-body">
        <p>{{ucwords($product->category->name)}}</p>
        <h4 class="card-product__title"><a href="/product/{{$product->slug}}">{{ucwords($product->name)}}</a></h4>
        <p class="card-product__price">${{$product->getPrice()}}</p>
    </div>
</div>

