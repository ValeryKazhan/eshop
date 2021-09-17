@props(['reviews'])

<div class="row total_rate mb-4">
    <div class="col-3">

    </div>
    <div class="col-6">
        <div class="box_total">
            <h5>Overall</h5>

            <h4>{{($number = count($reviews)) === 0? 'NO RATING YET' : round($reviews->sum('rating')/$number, 1)}}</h4>
            <h6>({{$number}} Reviews)</h6>
        </div>
    </div>

</div>
