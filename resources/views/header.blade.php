<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="/">
                    <img src="/img/logo6.png" alt="" style="width: 120px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        <x-li-link href="/">Home</x-li-link>
                        @auth
                            <x-dropdown :name="auth()->user()->name" href="/my-account">
                                <x-li-link href="/my-account">My Account</x-li-link>
                                <x-li-link href="/cart">My Cart</x-li-link>
                                <x-li-link href="/wishlist">My Wishlist</x-li-link>
                                <x-li-link href="/my-orders">My Orders</x-li-link>
                                <x-li-link href="/logout">Log Out</x-li-link>
                            </x-dropdown>
                        @else
                            <x-li-link href="/login">Login</x-li-link>
                            <x-li-link href="/register">Register</x-li-link>
                        @endauth
                        @admin
                        <x-dropdown :name="'Admin Panel'" href="/admin">
                            <x-li-link href="/admin/users">Users</x-li-link>
                            <x-li-link href="/admin/products">Products</x-li-link>
                            <x-li-link href="/admin/orders">Orders</x-li-link>
                            <x-li-link href="/admin/categories">Categories</x-li-link>
                            <x-li-link href="/admin/reviews">Reviews</x-li-link>
                            <x-li-link href="/admin/comments">Comments</x-li-link>
                        </x-dropdown>
                        @endadmin


                    </ul>

                    <ul class="nav-shop">
                        <li class="nav-item"><x-search-field-global/></li>
                        @auth
                            <li class="nav-item">
                                <a href="/wishlist">
                                    <button><i class="ti-heart"></i><span class="nav-shop__circle">{{$wishlist ? count($wishlist) : ''}}</span></button>
                                </a>
                            </li>
                        @endauth
                        <li class="nav-item">
                            <a href="/cart" class="mr-3">
                                <button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">{{ $cartItemsNumber>0? $cartItemsNumber : ''}}</span></button>
                            </a>
                        </li>

                        <x-order-link-button/>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
