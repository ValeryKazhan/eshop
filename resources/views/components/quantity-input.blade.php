@props(['id', 'name', 'value'])

<div class="product_count">
    <input type="text" name="{{$name}}" id="{{$id}}" maxlength="12"
           value="{{$value}}" title="Quantity:"
           class="input-text qty">
    <button
        onclick="var result = document.getElementById('{{$id}}');var id{{$id}} = result.value;if( !isNaN( id{{$id}} )) result.value++;return false;"
        class="increase items-count" type="button">
        <i class="lnr lnr-chevron-up"></i>
    </button>
    <button
        onclick="var result = document.getElementById('{{$id}}');var id{{$id}} = result.value;if( !isNaN( id{{$id}} ) &amp;&amp; id{{$id}} > 0 ) result.value--;return false;"
        class="reduced items-count" type="button">
        <i class="lnr lnr-chevron-down"></i>
    </button>
</div>
