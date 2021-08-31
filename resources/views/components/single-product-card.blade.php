@props(['product'])

<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="owl-carousel owl-theme s_Product_carousel">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="/img/category/s-p1.jpg" alt="">
                    </div>
                    <!-- <div class="single-prd-item">
                        <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
                    </div>
                    <div class="single-prd-item">
                        <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
                    </div> -->
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{ucwords($product->name)}}</h3>
                    <h2>${{$product->price}}</h2>
                    <ul class="list">
                        <li><a class="active" href="/category/{{$product->category->slug}}"><span>Category</span> : {{ucwords($product->category->name)}}</a></li>
{{--                        <li><a href="#"><span>Availibility</span> : In Stock</a></li>--}}
                    </ul>
                    <p>{{$product->description}}</p>
                    <form method="POST" action="/cart/product/{{$product->slug}}/add">
                        @csrf
                        <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                        <div class="product_count">
                            <label for="number">Quantity:</label>
                            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                    class="increase items-count" type="button"
{{--                                    style="margin-right: 178px; margin-top: 38px"--}}
                            ><i class="ti-angle-right"></i></button>
                            <input type="text" name="number" id="sst" size="2" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                    class="reduced items-count" type="button"
{{--                                    style="margin-right: 240px;"--}}
                            ><i class="ti-angle-left"></i></button>

{{--                                <a class="button primary-btn" type="submit" href="#">Add to Cart</a>--}}

                        </div>
                        <x-submit-button>
                            Add to Cart
                        </x-submit-button>
                    </form>

                    <div class="card_area d-flex align-items-center">
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
