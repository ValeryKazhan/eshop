@props(['product'])

<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="owl-carousel owl-theme s_Product_carousel">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="/img/category/s-p1.jpg" alt="">
                    </div>
                    <div class="single-prd-item">
                        <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
                    </div>
                    <div class="single-prd-item">
                        <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{$product->name}}</h3>
                    <h2>${{$product->price}}</h2>
                    <ul class="list">
                        <li><a class="active" href="/category/{{$product->category->slug}}"><span>Category</span> : {{ucwords($product->category->name)}}</a></li>
                    </ul>
                    <p>{{$product->description}}</p>
                    <div class="col-md-6">
                    <form method="POST" action="/cart/product/{{$product->slug}}/add">
                        @csrf
                        <div class="product_count">
                            <label for="number">Quantity:</label>
                            <x-quantity-input value="1" id="number" name="number"/>

                        </div>
                        <x-submit-button>
                            Add to Cart
                        </x-submit-button>
                    </form>
                    <form class="mt-3" method="POST" action="/wishlist/product/{{$product->slug}}/add">
                        @csrf
                        <x-submit-button>
                            Add to Wishlist
                        </x-submit-button>
                    </form>
                    </div>
                    <div class="card_area d-flex align-items-center">
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
