@props(['product'])

<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">

            <x-single-product-section-button :section="'home'">
                Description
            </x-single-product-section-button>

            <x-single-product-section-button :section="'profile'">
                Specification
            </x-single-product-section-button>

            <x-single-product-section-button :section="'contact'">
                Comments
            </x-single-product-section-button>

            <x-single-product-section-button :section="'review'" class="active">
                Reviews
            </x-single-product-section-button>

        </ul>
        <div class="tab-content" id="myTabContent">

            <x-single-product-section :section="'home'">
                <p>{{$product->description}}</p>
            </x-single-product-section>

            <x-single-product-section :section="'profile'">
                <x-single-product-specification :specification="$product->specification"/>
            </x-single-product-section>

            <x-single-product-section :section="'contact'">
                <div class="row">
                    <div class="col-lg-6">
                        <x-product-comments :comments="$product->comments"/>
                    </div>
                    <div class="col-lg-6">
                        @auth
                        <x-single-product-comment-form :product="$product"/>
                        @else
                            <div class="text-center mr-5 mb-5 mt-5">
                                <h4>To leave a comment</h4>
                            </div>

                            <x-login-or-register/>
                        @endauth
                    </div>
                </div>
            </x-single-product-section>

            <x-single-product-section :section="'review'" class="active">
                <div class="row">
                    <div class="col-lg-6">
                        <x-single-product-total-rating :reviews="$product->reviews"/>
                        <x-single-product-reviews :reviews="$product->reviews"/>
                    </div>
                    <div class="col-lg-6">
                        @auth
                            <x-single-product-review-form :product="$product"/>
                        @else

                                <div class="text-center mr-5 mb-5 mt-5">
                                    <h4>To leave the review</h4>
                                </div>
                                <x-login-or-register/>
                        @endauth
                    </div>
                </div>
            </x-single-product-section>
        </div>
    </div>
</section>
