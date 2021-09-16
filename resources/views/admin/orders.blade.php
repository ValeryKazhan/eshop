<x-layout title="Admin Panel">
    <div class="mt-5">
        <x-admin-table
            :columns="[
        'Id',
        isset($user)? 'Customer - '.$user->username : 'Customer' ,
        'Is Delivered',
        'Items',
        'Contacts',
        'Total Cost',
        'Created At',
        'Updated At',
        'Actions'
        ]"
        >
            <x-slot name="name">
                Orders
            </x-slot>
            @foreach($orders as $order)
                <x-admin-table-row>
                    <td>
                        {{$order->id}}
                    </td>
                    <td>
                        @if(isset($order->customer->id))
                        <a href="/admin/user/{{$order->customer->id}}/orders">{{$order->customer->name}}</a>
                        @else
                            DELETED
                        @endif
                    </td>
                    <td>
                        {{$order->is_delivered? 'Completed' : 'Active'}}
                    </td>
                    <td>
                        {{$order->getItemsNumber()}}
                    </td>
                    <td>

                        {{$order->contactsToString()}}
                    </td>
                    <td>
                        ${{$order->getTotalCost()}}
                    </td>
                    <td>
                        {{$order->created_at}}
                    </td>
                    <td>
                        {{$order->updated_at}}
                    </td>
                    <td>
                        <a href="/admin/order/{{$order->id}}/delete">DELETE</a>
                        <a href="/admin/order/{{$order->id}}/edit">EDIT</a>
                        <a href="/admin/order/{{$order->id}}">DETAILS</a>
                    </td>
                </x-admin-table-row>
            @endforeach

        </x-admin-table>
        <x-mtmb>
            {{$orders->links()}}
        </x-mtmb>
    </div>

</x-layout>
