<x-layout title="Admin Panel">
    <div class="mt-5">
        <x-admin-table
            :columns="['Id',
        'Name',
        'Username',
        'Is Admin',
        'Email',
        'Email Verified At',
        'Created At',
        'Updated At',
        'Actions']"
        >
            <x-slot name="name">
                Users <x-link-button href="/admin/user/create">Create One</x-link-button>
            </x-slot>
            @foreach($users as $user)
                <x-admin-table-row
                    :columns="[
                $user->id,
                $user->name,
                $user->username,
                $user->is_admin? 'YES' : 'NO',
                $user->email,
                $user->email_verified_at,
                $user->created_at,
                $user->updated_at
                ]"
                >
                    <td>
                        <a href="/admin/user/{{$user->id}}/delete">DELETE</a>
                        <a href="/admin/user/{{$user->id}}/edit">EDIT</a>
                    </td>
                </x-admin-table-row>
            @endforeach

        </x-admin-table>
        <x-mtmb>
            {{$users->links()}}
        </x-mtmb>


    </div>

</x-layout>
