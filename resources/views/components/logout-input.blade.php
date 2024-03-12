<div>
        <form action="{{route('profile.logout')}}" method="post">
            @csrf

            <x-primary-button>
                {{__('Logout')}}
            </x-primary-button>
        </form>
</div>
