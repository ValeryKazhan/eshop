@props(['orders'])

<x-table :columns="['Order Id','Quantity', 'Total', 'State', 'Action']">
    @foreach($orders as $order)
        <tr class="text-center">
            <td>
                {{$order->id}}
            </td>
            <td>
                {{$order->getItemsNumber()}}
            </td>
            <td>
                ${{$order->getTotalCost()}}
            </td>
            <td>
                {{$order->is_delivered ? 'COMPLETED' : 'ACTIVE'}}
            </td>
            <td>
                <a href="/order/{{$order->id}}">SEE DETAILS</a>
            </td>
        </tr>
    @endforeach
</x-table>
