@php
    const EMPTY_STRING = '';
    if(isset($order)){
        $isDelivered = $order->is_delivered;
        $contacts = $order->contacts;
        $pageName = 'Update Order '.$product->name;
        $action = '/admin/order/'.$order->id.'/update';
        $buttonWord = 'Update';
    } else{
        $isDelivered = false;
        $pageName = 'Create Order';
        $action = '/admin/order/store';
        $buttonWord = 'Create';
    }
@endphp

<x-layout title="Admin Panel">
    <x-start-banner header="Admin Panel" :pageName="$pageName"/>
    <div class="container mt-5">

        <h3 class="text-center">{{$pageName}}</h3>

        <form method="POST" action="{{$action}}" class="row login_form mt-5 " style="margin-left: 440px">

            @csrf
            <x-admin-input-field :name="'Country'">
                <input
                    type="text"
                    id="country"
                    name="contacts[country]"
                    value="{{}}"
                    required
                >
                <x-error :id="'country'"/>
            </x-admin-input-field>

            <x-admin-input-field :name="'Region'">
                <input
                    type="text"
                    id="region"
                    name="contacts[region]"
                >
                <x-error :id="'region'"/>

            </x-admin-input-field>
            <x-admin-input-field :name="'Locality'">
                <input
                    type="text"
                    id="locality"
                    name="contacts[locality]"
                    required
                >
                <x-error :id="'locality'"/>
            </x-admin-input-field>
            <x-admin-input-field :name="'Street'">
                <input
                    type="text"
                    id="street"
                    name="contacts[street]"
                    required
                >
                <x-error :id="'street'"/>
            </x-admin-input-field>
            <x-admin-input-field :name="'House/Apartment Number'">
                <input
                    type="text"
                    id="house"
                    name="contacts[house]"
                    required
                >
                <x-error :id="'house'"/>
            </x-admin-input-field>
            <x-admin-input-field :name="'Enter the Post Index'">
                <input
                    type="text"
                    id="postcode"
                    name="contacts[postcode]"
                    required
                >
                <x-error :id="'postcode'"/>
            </x-admin-input-field>
            <x-admin-input-field :name="'Contact Phone'">
                <input
                    type="text"
                    id="phone"
                    name="contacts[phone]"
                    required
                >
                <x-error :id="'phone'"/>
            </x-admin-input-field>

            <div class="col-md-4 form-group text-center mt-3">
                <button type="submit" class="button button-register w-100">{{$buttonWord}}</button>
                <x-errors/>
            </div>
        </form>
    </div>
</x-layout>


