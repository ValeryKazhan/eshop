@props(['order'])

<div class="row mb-5">
    <x-order-props-single-card :name="'Order Info'">
        @admin
        <x-order-prop :name="'User'"><a href="/admin/user/{{$order->customer->id}}/edit">{{$order->customer->name}}</a> </x-order-prop>
        @endadmin
        <x-order-prop :name="'Order Number'">{{$order->id}}</x-order-prop>
        <x-order-prop :name="'Date'">{{$order->created_at->format("F j, Y")}}</x-order-prop>
        <x-order-prop :name="'Total'">{{$order->getTotalCost()}}</x-order-prop>
        <x-order-prop :name="'Payment method'">Check payments</x-order-prop>
    </x-order-props-single-card>



    <x-order-props-single-card :name="'Shipping Address'">
        <x-order-prop :name="'Street'">{{$order->contacts['street']}}</x-order-prop>
        <x-order-prop :name="'Locality'">{{$order->contacts['locality']}}</x-order-prop>
        <x-order-prop :name="'Country'">{{$order->contacts['country']}}</x-order-prop>
        <x-order-prop :name="'Postcode'">{{$order->contacts['index']}}</x-order-prop>
    </x-order-props-single-card>

</div>
