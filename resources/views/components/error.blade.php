@props(['id'])

@error($id)
<p class="text-xs mt-1" style="color: #990000">{{$message}}</p>
@enderror
