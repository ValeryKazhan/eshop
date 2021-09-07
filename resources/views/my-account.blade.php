<x-layout>
    <x-start-banner :pageName="'Personal Account'" :header="$user->name"/>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="border col-md-8">
                <p class="text-center billing-alert font-weight-bold mt-4" style="color:#d01d33">You
                    have {{count($activeOrders)}} active orders!</p>

                <x-orders-table :orders="$activeOrders"/>
            </div>
            <div class="col-4">
                <x-link-button href="/cart" class="text-center w-100 mt-3">Go To Cart</x-link-button>
                <x-link-button href="/my-orders" class="text-center w-100 mt-3">My Orders</x-link-button>
                <x-link-button href="/wishlist" class="text-center w-100 mt-3">Wishlist</x-link-button>
                <x-link-button href="/logout"  class="text-center w-100 mt-3">Log Out</x-link-button>
            </div>

        </div>

    </div>


</x-layout>

