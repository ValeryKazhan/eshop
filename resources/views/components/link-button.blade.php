@props(['class' => ''])

<a class="button button-login mr-5 {{$class}}" {{$attributes->merge(['href'=>''])}}>{{$slot}}</a>
