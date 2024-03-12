@vite(['resources/css/registration.css'])
<div class="container">
<form action="{{ route('register') }}" method="POST">
    @csrf

    <!-- Name -->
    <div>
        <x-input-label :value="__('Name')" />
        <x-text-input type="text" name="name" value="{{ old('name') }}" />
        <x-input-error :messages="$errors->first('name')" />
    </div>

    <!-- Email -->
    <div>
        <x-input-label :value="__('Email')" />
        <x-text-input type="text" name="email" value="{{ old('email') }}" />
        <x-input-error :messages="$errors->first('email')" />
    </div>

    <!-- Password -->
    <div>
        <x-input-label :value="__('Password')" />
        <x-text-input type="password" name="password" value="{{ old('password') }}"/>
        <x-input-error :messages="$errors->first('password')" />
    </div>

    <!-- Confirm password -->
    <div>
        <x-input-label :value="__('Confirm password')" />
        <x-text-input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" />
        <x-input-error :messages="$errors->first('password_confirmation')" />
    </div>

    <div>
        <x-primary-button>
            {{ __("Register") }}
        </x-primary-button>
    </div>
</form>
</div>
