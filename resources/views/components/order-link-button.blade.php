@props(['name'=>'ORDER NOW', 'href' => '/order/create'])

<a href="{{$href}}">
    <button class="button-register text-white" style="width: 250px; height: 50px; font-size: 20px">
        {{$name}}
    </button>
</a>
