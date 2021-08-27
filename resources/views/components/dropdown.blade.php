@props(['name' => 'dropdown'])

<li class="nav-item submenu dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
       aria-expanded="false">{{$name}}</a>
    <ul class="dropdown-menu">
        {{$slot}}
    </ul>
</li>
