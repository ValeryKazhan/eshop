@props(['product'])

<div class="review_box">
    <h4>Add a Review</h4>
    <form method="POST" action="/product/{{$product->slug}}/review" class="form-contact form-review mt-3">
        @csrf
        <div class="form-group">
            <input class="form-control" id="rating" name="rating" type="number" placeholder="Rating">
        </div>
        <x-error :id="'rating'"/>
        <div class="form-group">
            <textarea class="form-control different-control w-100" name="body" id="body" cols="30" rows="5" placeholder="Your Opinion"></textarea>
        </div>
        <x-error :id="'body'"/>
        @error('product_id')
        <p class="text-xs mt-1" style="color: #990000">You have already added a review to this product</p>
        @enderror
        <div class="form-group text-center text-md-right mt-3">
            <button type="submit" class="button button--active button-review">Submit Now</button>
        </div>
    </form>
</div>
