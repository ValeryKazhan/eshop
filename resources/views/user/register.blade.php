<x-layout>

    <x-start-banner
        :header="'Register'"
        :pageName="'Register'"
    />

    <x-login-area>
        <x-slot name="alternative">
            <h4>Already have an account?</h4>
            <p>Log in into the existing account</p>
            <a class="button button-account" href="/login">Login Now</a>
        </x-slot>


        <h3>Create an account</h3>
        <form method="POST" class="row login_form" action="/register">

            @csrf

            <x-input-field>
                <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Username"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Username'"
                >
            </x-input-field>
            <x-error :name="'username'"/>


            <x-input-field>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    placeholder="Name"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Name'"
                >
            </x-input-field>
            <x-error :name="'name'"/>

            <x-input-field>
                <input type="email"
                       class="form-control"
                       id="email"
                       name="email"
                       placeholder="Email Address"
                       onfocus="this.placeholder = ''"
                       onblur="this.placeholder = 'Email Address'"
                >
            </x-input-field>
            <x-error :name="'email'"/>

            <x-input-field>
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="Password"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Password'"
                >
            </x-input-field>
            <x-error :name="'password'"/>

            {{--                            LEAVE IT FOR LATER--}}
            {{--                            <x-input-field>--}}
            {{--                                <input type="password"--}}
            {{--                                       class="form-control"--}}
            {{--                                       id="confirmPassword"--}}
            {{--                                       name="confirmPassword"--}}
            {{--                                       placeholder="Confirm Password"--}}
            {{--                                       onfocus="this.placeholder = ''"--}}
            {{--                                       onblur="this.placeholder = 'Confirm Password'"--}}
            {{--                                >--}}
            {{--                            </x-input-field>--}}

            <div class="col-md-12 form-group">
                {{--                                <x-input-checkbox/>--}}
            </div>
            <div class="col-md-12 form-group">
                <button type="submit" class="button button-register w-100">Register</button>

                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 text-xs">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif

            </div>
        </form>

    </x-login-area>

</x-layout>


