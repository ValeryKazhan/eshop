@php
    $months = [
    1 => 'January',
    2 => 'February',
    3 => 'March',
    4 => 'April',
    5 => 'May',
    6 => 'June',
    7 => 'July',
    8 => 'August',
    9 => 'September',
    10 => 'October',
    11 => 'November',
    12 => 'December'
];
@endphp
<meta name="public-key" content="{{env('STRIPE_KEY')}}">
<x-layout title="Checkout">

    <form id="billing-form">
        <div>
            <label>
                <span>Card Number:</span>
                <input type="text" data-stripe="number">
            </label>
        </div>
        <div>
            <label>
                <span>CVC:</span>
                <input type="text" data-stripe="cvc">
            </label>
        </div>

        <div>
            <span>Expiration Date:</span>
            <select data-stripe="exp-month">
                @foreach($months as $number=>$name)
                    <option value="{{$number}}">{{$name}}</option>
                @endforeach
            </select>

            <select data-stripe="exp-year">
                @for($year = now()->year; $year < (now()->year + 10); $year++)
                    <option value="{{$year}}">{{$year}}</option>
                @endfor
            </select>
        </div>
        <x-submit-button>
            BUY
        </x-submit-button>
    </form>
    <script src="https://js.stripe.com/v3/" defer></script>
    <script defer>
        (function (){
            let StripeBilling = {
                init: function (){
                    this.form = $('#billing-form');
                    this.submitButton = this.form.find('input[type=submit]');
                    let stripeKey = $('meta[name="publishable-key"]').attr('content');
                    S
                }
            };
            StripeBilling.init();

        })();


    </script>
</x-layout>


