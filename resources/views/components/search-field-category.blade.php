
@php

    $search = request('search');
    $search ? true : $search='';

@endphp

<div>
    <form method="GET" action="#">
    <div class="input-group filter-bar-search" >
            <input type="text" name="search" placeholder="Search in this category" value="{{$search}}">
            <div class="input-group-append">
                <button type="submit"><i class="ti-search"></i></button>
            </div>
    </div>
    </form>
</div>
