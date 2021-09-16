@php
    $string = '';
        if(isset($product))
            $string = 'on product '.$product->name;
        elseif(isset($user))
            $string = 'of user '.$user->name;
@endphp

<x-layout title="Admin Panel">
    <div class="mt-5">
        <x-admin-table
            :columns="[
        'Id',
        'User',
        'Product',
        'rating',
        'Body',
        'Created At',
        'Updated At',
        'Actions'
        ]"
        >
            <x-slot name="name">
                Reviews {{$string}}
            </x-slot>
            @foreach($reviews as $review)
                <x-admin-table-row>
                    <td>
                        {{$review->id}}
                    </td>
                    <td>
                        <a href="/admin/user/{{$review->author->id}}/reviews">{{$review->author->name}}</a>
                    </td>
                    <td>
                        <a href="/admin/product/{{$review->product->id}}/reviews">{{$review->product->name}}</a>
                    </td>
                    <td>
                        {{$review->rating}}
                    </td>
                    <td>
                        {{$review->body}}
                    </td>
                    <td>
                        {{$review->created_at}}
                    </td>
                    <td>
                        {{$review->updated_at}}
                    </td>
                    <td>
                        <a href="/admin/review/{{$review->id}}/delete">DELETE</a>
                        <a href="/admin/review/{{$review->id}}/edit">EDIT</a>
                    </td>
                </x-admin-table-row>
            @endforeach

        </x-admin-table>
        <x-mtmb>
            {{$reviews->links()}}
        </x-mtmb>
    </div>

</x-layout>
