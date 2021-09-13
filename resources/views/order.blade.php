<x-layout title="Order {{$order->id}}">
    <x-start-banner :header="'Order Page'" :pageName="'Order №'.$order->id"/>


    <section class="order_details section-margin--small">
        <div class="container">
            <p class="text-center billing-alert" {{$order->is_delivered ? ''  : 'style=color:#d01d33'}}>{{$order->is_delivered ? 'Thank you. Your
                order has been received.': 'Order is active. Has not been received'}}</p>
            <x-order-props :order="$order"/>
            <x-purchases-table :purchases="$order->getPurchasesModels()" :name="'Order id: '.$order->id"/>

            <div class="text-center mt-5">
            <x-link-button href="/">Continue Shopping</x-link-button>
            <x-link-button href="/my-orders">My Orders</x-link-button>
            </div>
        </div>

    </section>
</x-layout>


