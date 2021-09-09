@props(['reviews'])


<div class="review_list">
    @foreach($reviews as $review)
        <div class="review_item">
            <div class="media">
                <div class="d-flex">
                    <img src="/img/product/review-1.png" alt="">
                </div>
                <div class="media-body">
                    <h4>{{$review->author->name}}</h4>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
            </div>
            <p>{{$review->body}}</p>
        </div>
    @endforeach
</div>
