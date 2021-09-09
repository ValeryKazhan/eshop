@props(['class' => ''])

<a class="button button-login mr-3 {{$class}}" {{$attributes->merge(['href'=>''])}}>{{$slot}}</a>
