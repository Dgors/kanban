<form action="{{route('profile.restore')}}" method="post">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div>
        <x-input-error :messages="$errors->get('alert')" />
    </div>
    <div>
        <x-input-label :value="__('Email')"/>
        <x-text-input name="email" type="email" />
        <x-input-error :messages="$errors->get('email')" />
    </div>

    <div>
        <x-input-label :value="__('Password')"/>
        <x-text-input name="password" type="password" />
        <x-input-error :messages="$errors->get('password')" />
    </div>
    <x-text-input name="name" type="text" />

    <div>
        <x-primary-button>
            {{__('Restore')}}
        </x-primary-button>
    </div>
</form>
