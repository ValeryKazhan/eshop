<x-layout title="Admin Panel">
    <div class="mt-5">
        <x-admin-table
            :columns="[
        'Id',
        'Slug',
        'Name',
        'Products',
        'Created At',
        'Updated At',
        'Actions'
        ]"
        >
            <x-slot name="name">
                Categories <x-link-button href="/admin/category/create">Create One</x-link-button>
            </x-slot>
            @foreach($categories as $category)
                <x-admin-table-row>
                    <td>
                        {{$category->id}}
                    </td>
                    <td>
                       {{$category->slug}}
                    </td>
                    <td>
                        {{$category->name}}
                    </td>
                    <td>
                        <a href="/admin/category/{{$category->id}}/products">Products</a>
                    </td>
                    <td>
                        {{$category->created_at}}
                    </td>
                    <td>
                        {{$category->updated_at}}
                    </td>
                    <td>
                        <a href="/admin/category/{{$category->id}}/delete">DELETE</a>
                        <a href="/admin/category/{{$category->id}}/edit">EDIT</a>
                    </td>
                </x-admin-table-row>
            @endforeach

        </x-admin-table>
        <x-mtmb>
            {{$categories->links()}}
        </x-mtmb>
    </div>

</x-layout>
