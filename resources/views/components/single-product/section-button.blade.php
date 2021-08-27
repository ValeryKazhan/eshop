@props(['section'])

<li class="nav-item">
    <a {{$attributes->merge(['class'=>'nav-link '])}} id="{{$section}}-tab" data-toggle="tab" href="#{{$section}}" role="tab" aria-controls="{{$section}}" aria-selected="true"
    >
        {{$slot}}
    </a>
</li>
