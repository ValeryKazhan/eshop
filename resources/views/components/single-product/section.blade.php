@props(['section'])

<div {{$attributes->merge(['class'=>'tab-pane'])}} id="{{$section}}" role="tabpanel" aria-labelledby="{{$section}}-tab">
    {{$slot}}
</div>
