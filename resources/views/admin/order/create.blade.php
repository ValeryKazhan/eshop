@php
    const EMPTY_STRING = '';
    if(isset($order)){
        $isDelivered = $order->is_delivered;
        $country = $order->contacts['country'];
        $region = $order->contacts['region'];
        $locality = $order->contacts['locality'];
        $street = $order->contacts['street'];
        $house = $order->contacts['house'];
        $postcode = $order->contacts['index'];
        $phone = $order->contacts['phone'];
        $pageName = 'Update Order '.$order->name;
        $action = '/admin/order/'.$order->id.'/update';
        $buttonWord = 'Update';
    } else{
        $isDelivered = false;
        $country = EMPTY_STRING;
        $region = EMPTY_STRING;
        $locality = EMPTY_STRING;
        $street = EMPTY_STRING;
        $house = EMPTY_STRING;
        $postcode = EMPTY_STRING;
        $phone = EMPTY_STRING;
        $pageName = 'Create Order';
        $action = '/admin/order/store';
        $buttonWord = 'Create';
    }
@endphp

<x-layout title="Admin Panel">
    <x-start-banner header="Admin Panel" :pageName="$pageName"/>
    <div class="container mt-5">

        <h3 class="text-center">{{$pageName}}</h3>

        <form method="POST" action="{{$action}}" class="row login_form mt-5 ">

            @csrf

            <x-admin-input-field :name="'User'.(isset($order)? ' - '.$order->customer->name : '')">
                <select
                    id="user_id"
                    name="user_id"
                >
                    @foreach($users as $user)
                        <option
                            value="{{$user->id}}" {{isset($order)&&($user->id === $order->customer->id) ? 'selected' : ''}}>{{$user->name}}
                        </option>
                    @endforeach
                </select>
            </x-admin-input-field>

            <x-admin-input-field :name="'Country'">
                <input
                    class="input-group"
                    type="text"
                    id="country"
                    name="country"
                    value="{{$country}}"
                    required
                >
                <x-error :id="'country'"/>
            </x-admin-input-field>

            <x-admin-input-field :name="'Region'">
                <input
                    class="input-group"
                    type="text"
                    id="region"
                    name="region"
                    value="{{isset($region)? $region : EMPTY_STRING}}"
                >
                <x-error :id="'region'"/>
            </x-admin-input-field>

            <x-admin-input-field :name="'Locality'">
                <input
                    class="input-group"
                    type="text"
                    id="locality"
                    name="locality"
                    value="{{$locality}}"
                    required
                >
                <x-error :id="'locality'"/>
            </x-admin-input-field>

            <x-admin-input-field :name="'Street'">
                <input
                    class="input-group"
                    type="text"
                    id="street"
                    name="street"
                    value="{{$street}}"
                    required
                >
                <x-error :id="'street'"/>
            </x-admin-input-field>

            <x-admin-input-field :name="'House/Apartment Number'">
                <input
                    class="input-group"
                    type="text"
                    id="house"
                    name="house"
                    value="{{$house}}"
                    required
                >
                <x-error :id="'house'"/>
            </x-admin-input-field>

            <x-admin-input-field :name="'postcode'">
                <input
                    class="input-group"
                    type="text"
                    id="index"
                    name="index"
                    value="{{$postcode}}"
                    required
                >
                <x-error :id="'index'"/>
            </x-admin-input-field>

            <x-admin-input-field :name="'Contact Phone'">
                <input
                    class="input-group"
                    type="text"
                    id="phone"
                    name="phone"
                    value="{{$phone}}"
                    required
                >
                <x-error :id="'phone'"/>
            </x-admin-input-field>

            @if(isset($order))
                <x-admin-input-field :name="'Is delivered'">
                    <select
                        id="is_delivered"
                        name="is_delivered"
                    >
                        <option
                            value="{{1}}" {{ $order->is_delivered ? 'selected' : ''}}>TRUE
                        </option>
                        <option
                            value="{{0}}" {{ !$order->is_delivered ? 'selected' : ''}}>FALSE
                        </option>
                    </select>
                </x-admin-input-field>
            @endif


            <div class="col-md-4 form-group text-center mt-3">
                <button type="submit" class="button button-register w-100">{{$buttonWord}}</button>
                <x-errors/>
            </div>
        </form>
    </div>
</x-layout>


