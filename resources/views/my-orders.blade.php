<x-layout title="My Orders">
    <div class="container">
        <p class="text-center billing-alert font-weight-bold mt-4" style="color:#d01d33">You
            have {{($activeOrdersNumber = count($activeOrders))}}{{($activeOrdersNumber==1)? ' active order!' : ' active orders!'}}</p>
        <x-orders-table :orders="$activeOrders"/>

        <p class="text-center billing-alert font-weight-bold mt-4">Completed orders ({{($completedOrdersNumber = count($completedOrders))}})</p>
        @if($completedOrdersNumber > 0)
        <x-orders-table :orders="$completedOrders"/>
        @endif
    </div>
</x-layout>
