@props(['name' => 'Order SessionCart'])

<div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
    <div class="confirmation-card">
        <h3 class="billing-title">{{$name}}</h3>
        <table class="order-table">
            {{$slot}}
        </table>
    </div>
</div>
