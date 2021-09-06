@props(['name'])
<div class="col-md-12 mb-3">
    <div class="col-md-1 text-left">
        <h4>{{$name}}</h4>
    </div>
    <div class="col-md-6">
        {{$slot}}
    </div>
</div>

