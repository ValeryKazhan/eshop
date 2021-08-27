@props(['reviews'])

<div class="row total_rate">
    <div class="col-6">
        <div class="box_total">
            <h5>Overall</h5>
            <h4>{{round($reviews->sum('rating')/($number = count($reviews)), 1)}}</h4>
            <h6>({{$number}} Reviews)</h6>
        </div>
    </div>
    <div class="col-6">
        <div class="rating_list">
            <h3>Based on {{$number}} Reviews</h3>
            <ul class="list">
                <li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                <li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                <li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                <li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                <li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
            </ul>
        </div>
    </div>
</div>
