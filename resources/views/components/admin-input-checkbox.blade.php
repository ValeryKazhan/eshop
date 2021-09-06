@props(['id', 'name', 'isAdmin'])
<div class="creat_account">
    <input type="hidden" id="{{$id}}" name="{{$name}}" value="{{0}}">
    <input type="checkbox" id="{{$id}}" name="{{$name}}" value="{{1}}" {{$isAdmin==1? 'checked' : ''}}>
    <label for="is_admin">Has Admin Rights</label>
</div>
