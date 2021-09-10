@props(['purchases', 'name' => 'purchases'])
<div class="order_details_table">
    <h2>{{$name}}</h2>
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total</th>
        </tr>
        </thead>
        <tbody>
        @php
            $N=0;
            $totalCost=0;
        @endphp

        @foreach($purchases as $purchase)

            @php
                $N++;
                $totalCost+=$purchase->getCost();
            @endphp
            <tr>
                <td>
                    {{$N}}
                </td>

                <td>
                    <p style="width: 50px">{{ucwords($purchase->product->name)}}</p>
                </td>

                <td>
                    <p>${{$purchase->price}}</p>
                </td>

                <td>
                    <h5>x {{$purchase->number}}</h5>
                </td>
                <td>
                    <p>${{$purchase->getCost()}}</p>
                </td>
            </tr>
        @endforeach

        <tr>
            <td></td>
            <td>
                <h4>Total</h4>
            </td>
            <td>
                <h5></h5>
            </td>
            <td>

            </td>
            <td>
                <h4>${{$totalCost}}</h4>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</div>
