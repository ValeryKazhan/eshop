@props(['product'])

<div class="review_box">
    <h4>Post a comment</h4>
    <form class="row contact_form" action="/product/{{$product->slug}}/comment" method="POST" id="contactForm">
        @csrf
        <div class="col-md-12">
            <div class="form-group">
                <textarea class="form-control" name="body" id="body" rows="6" placeholder="Message"></textarea>
            </div>
        </div>
        <x-error :id="'body'"/>
        <div class="col-md-12 text-right">
            <button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
        </div>
    </form>
</div>
