@props(['comments'])

<div class="comment_list">

    @foreach($comments as $comment)
        <div class="review_item">
            <div class="media">
                <div class="d-flex">
                    <img src="/img/product/review-1.png" alt="">
                </div>
                <div class="media-body">
                    <h4>{{$comment->author->name}}</h4>
                    <h5><x-time-format
                            :time="$comment->created_at"
                        />
                    </h5>
{{--                    <a class="reply_btn" href="#">Reply</a>--}}
                </div>
            </div>
            <p>{{$comment->body}}</p>
        </div>
    @endforeach

</div>
