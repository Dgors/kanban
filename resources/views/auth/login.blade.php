<form action="{{ route('login') }}" method="post">
    @csrf

    <x-input-error :messages="$errors->get('alert')" />

    <div>
        <x-input-label :value="__('Name')" />
        <x-text-input type="text" name="name" value="{{ old('name') }}" />
        <x-input-error :messages="$errors->first('name')" />
    </div>

    <div>
        <x-input-label :value="__('Password')" />
        <x-text-input type="text" name="password" value="{{ old('password') }}" />
        <x-input-error :messages="$errors->first('password')" />
    </div>

    <div>
        <x-primary-button>
            {{ __("Login") }}
        </x-primary-button>
    </div>
</form>
