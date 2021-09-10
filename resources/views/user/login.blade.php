<x-layout title="Log In">
    <x-start-banner :header="'Login'" :pageName="'Login'"/>

    <x-login-area>
        <x-slot name="alternative">
            <h4>New to our website?</h4>
            <p>If you don't have an account, please register on our website</p>
            <a class="button button-account" href="/register">Create an Account</a>
        </x-slot>

        <h3>Log in to enter</h3>
        <form method="POST" class="row login_form" action="/login">
            @csrf
            <x-input-field>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Email"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Email'"
                >
            </x-input-field>
            <x-error :id="'email'"/>

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
            <x-error :id="'password'"/>

            <div class="col-md-12 form-group">
{{--                <x-input-checkbox/>--}}
            </div>

            <div class="col-md-12 form-group">
                <x-submit-button>
                    Log In
                </x-submit-button>
{{--                <a href="#">Forgot Password?</a>--}}
            </div>
        </form>
    </x-login-area>

</x-layout>
