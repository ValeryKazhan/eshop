<x-layout>
    <div class="container">
        <p class="text-center billing-alert font-weight-bold mt-4" style="color:#d01d33">You
            have {{count($activeOrders)}} active orders!</p>
        <x-orders-table :orders="$activeOrders"/>

        <p class="text-center billing-alert font-weight-bold mt-4">Completed orders ({{count($completedOrders)}})</p>
        <x-orders-table :orders="$completedOrders"/>
    </div>
</x-layout>
