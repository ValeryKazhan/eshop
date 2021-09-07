<x-layout>
    <div class="mt-5">
        <x-admin-table
            :columns="[
        'Id',
        isset($category)? 'Category - '.$category->name : 'Category' ,
        'Slug',
        'Name',
        'Description',
        'Specification',
        'Price',
        'Created At',
        'Updated At',
        'Actions'
        ]"
        >
            <x-slot name="name">
                Products <x-link-button href="/admin/product/create">Create One</x-link-button>
            </x-slot>
            @foreach($products as $product)
                <x-admin-table-row>
                    <td>
                        {{$product->id}}
                    </td>
                    <td>
                        <a href="/admin/category/{{$product->category->id}}/products">{{$product->category->name}}</a>
                    </td>
                    <td>
                        {{$product->slug}}
                    </td>
                    <td>
                        {{$product->name}}
                    </td>
                    <td>
                        {{$product->description}}
                    </td>
                    <td>
                        {{$product->specification}}
                    </td>
                    <td>
                        ${{$product->price}}
                    </td>
                    <td>
                        {{$product->creted_at}}
                    </td>
                    <td>
                        {{$product->updated_at}}
                    </td>
                    <td>
                        <a href="/admin/product/{{$product->id}}/delete">DELETE</a>
                        <a href="/admin/product/{{$product->id}}/edit">EDIT</a>
                    </td>
                </x-admin-table-row>
            @endforeach

        </x-admin-table>
    </div>

</x-layout>
