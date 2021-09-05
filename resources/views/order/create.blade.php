<x-layout>
    <x-start-banner :header="'Order Registration'" :pageName="'Order Registration'"/>

    <!--================Order Details Area =================-->
    <section class="order_details section-margin--small">
        <div class="container">

            @if ($errors->any())
                <ul class="text-xs text-center alert-danger">
                    @foreach ($errors->all() as $error)
                        <li
                            {{--                            style="color: #990000"--}}
                        >{{$error}}</li>
                    @endforeach
                </ul>
                @endif




            <x-purchases-table :purchases="$purchases" :name="'Crate New Order'"/>



            <div class="text-right mt-3">
                <x-link-button href="/cart">
                    Change My Order
                </x-link-button>
            </div>

            <h3>Destination Address</h3>
            <form class="row contact_form" action="/order/store" method="POST">
                @csrf

                <x-input-address :name="'Enter the Country Destination'">
                    <input
                        type="text"
                        class="form-control"
                        id="country"
                        name="country"
                        placeholder="Country"
                        required
                    >
                    <x-error :id="'country'"/>
                </x-input-address>
                <x-input-address :name="'Specify the Region of your country'">
                    <input
                        type="text"
                        class="form-control"
                        id="region"
                        name="region"
                        placeholder="Region (not necessary)"
                    >
                    <x-error :id="'region'"/>
                </x-input-address>
                <x-input-address :name="'Enter the Locality'">
                    <input
                        type="text"
                        class="form-control"
                        id="locality"
                        name="locality"
                        placeholder="Locality"
                        required
                    >
                    <x-error :id="'locality'"/>
                </x-input-address>
                <x-input-address :name="'Enter the Street Name'">
                    <input
                        type="text"
                        class="form-control"
                        id="street"
                        name="street"
                        placeholder="Street"
                        required
                    >
                    <x-error :id="'street'"/>
                </x-input-address>
                <x-input-address :name="'Enter the House/Apartment Number'">
                    <input
                        type="text"
                        class="form-control"
                        id="house"
                        name="house"
                        placeholder="House/Apartment Number"
                        required
                    >
                    <x-error :id="'house'"/>
                </x-input-address>
                <x-input-address :name="'Enter the Post Index'">
                    <input
                        type="text"
                        class="form-control"
                        id="postcode"
                        name="postcode"
                        placeholder="Post Index"
                        required
                    >
                    <x-error :id="'postcode'"/>
                </x-input-address>
                <x-input-address :name="'Enter the Contact Phone (without \'+\' sign)'">
                        <input
                            type="text"
                            class="form-control"
                            id="phone"
                            name="phone"
                            placeholder="Phone Number"
                            required
                        >
                    <x-error :id="'phone'"/>
                </x-input-address>
                <div class="col-4  form-group p_star">

                </div>
                <div class="col-4 mt-2">
                    <x-submit-button>
                        I Confirm
                    </x-submit-button>

                </div>
            </form>

        </div>


    </section>
    <!--================End Order Details Area =================-->
</x-layout>


