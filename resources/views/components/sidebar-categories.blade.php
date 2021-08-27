@props(['categories'])

<div class="sidebar-categories">
    <div class="head">Browse Categories</div>
    <ul class="main-categories">
        <li class="common-filter">
{{--            <form action="#">--}}
                <ul>
                    @foreach($categories as $category)
                    <li class="filter-list">
{{--                        <input class="pixel-radio" type="radio" id="men" name="brand">--}}
                        <label for="men">
                            <a href="/category/{{$category->slug}}">{{ucwords($category->name)}}</a>
                            <span> ({{count($category->products)}})</span>
                        </label>
                    </li>
                    @endforeach
                </ul>
{{--            </form>--}}
        </li>
    </ul>
</div>
