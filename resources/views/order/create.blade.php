<x-layout title="Create Order">

    <x-start-banner :header="'Order Registration'" :pageName="'Order Registration'"/>

    <section class="order_details section-margin--small">
        <div class="container">

            @if ($errors->any())
                <ul class="text-xs text-center alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
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
                        value="{{old('country')}}"
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
                        value="{{old('region')}}"
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
                        value="{{old('region')}}"
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
                        value="{{old('street')}}"
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
                        value="{{old('house')}}"
                        required
                    >
                    <x-error :id="'house'"/>
                </x-input-address>
                <x-input-address :name="'Enter the Post Index'">
                    <input
                        type="text"
                        class="form-control"
                        id="index"
                        name="index"
                        placeholder="Post Index"
                        value="{{old('index')}}"
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
                        value="{{old('phone')}}"
                        required
                    >
                    <x-error :id="'phone'"/>
                </x-input-address>
                <div class="col-4  form-group p_star">

                </div>

                <div class="form-group">
                    <input id="cart" name="cart">
                    <input id>
{{--                    <label for="card-element">--}}
{{--                        Credit or debit card--}}
{{--                    </label>--}}
{{--                    <div id="card-element">--}}

{{--                    </div>--}}
                </div>

                <div class="col-4 mt-2">
                    <x-submit-button>
                        I Confirm
                    </x-submit-button>

                </div>
            </form>

        </div>


    </section>
    <script src="https://js.stripe.com/v3/" defer></script>
    <link rel="stylesheet" href="/css/stripe.scss">


</x-layout>

<script>

    (function (){
        let stripe = Stripe({{env('stripe_key')}});
        let elements = stripe.elements();

        let style = {
            base: {
                color: '#303238',
                fontSize: '16px',
                fontFamily: '"Open Sans", sans-serif',
                fontSmoothing: 'antialiased',
                '::placeholder': {
                    color: '#CFD7DF',
                },
            },
            invalid: {
                color: '#e5424d',
                ':focus': {
                    color: '#303238',
                },
            },
        };

    })();
</script>


