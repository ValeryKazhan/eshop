@props(['time'])

<time>{{$time? $time->format("F j, Y, g:i a"): 'NO TIME DATA'}}</time>
