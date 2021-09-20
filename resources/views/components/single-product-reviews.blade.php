@props(['reviews'])


<div class="review_list">
    @foreach($reviews as $review)

        <div class="review_item">
            <div class="media">
                <div class="d-flex">
                    <img src="/img/product/review-{{$loop->iteration}}.png" alt="">
                </div>
                <div class="media-body">
                    <h4>{{$review->author->name}}</h4>
                    Rating: {{$review->rating}}
                </div>
            </div>
            <p>{{$review->body}}</p>
        </div>
    @endforeach
</div>

