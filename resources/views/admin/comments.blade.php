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
        'Body',
        'Created At',
        'Updated At',
        'Actions'
        ]"
        >
            <x-slot name="name">
                Comments {{$string}}
            </x-slot>
            @foreach($comments as $comment)
                <x-admin-table-row>
                    <td>
                        {{$comment->id}}
                    </td>
                    <td>
                        <a href="/admin/user/{{$comment->author->id}}/comments">{{$comment->author->name}}</a>
                    </td>
                    <td>
                        <a href="/admin/product/{{$comment->product->id}}/comments">{{$comment->product->name}}</a>
                    </td>
                    <td>
                        {{$comment->body}}
                    </td>
                    <td>
                        {{$comment->created_at}}
                    </td>
                    <td>
                        {{$comment->updated_at}}
                    </td>
                    <td>
                        <a href="/admin/comment/{{$comment->id}}/delete">DELETE</a>
                        <a href="/admin/comment/{{$comment->id}}/edit">EDIT</a>
                    </td>
                </x-admin-table-row>
            @endforeach

        </x-admin-table>
        <x-mtmb>
            {{$comments->links()}}
        </x-mtmb>
    </div>

</x-layout>
