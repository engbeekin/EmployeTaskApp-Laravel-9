@component('mail::message')
    # Hello Mr {{ $user->name }}
    # Welcome Beekin Company

    thank you for join us ....

    this your details so if any thing wrong please update in your page
    name: {{ $user->name }}
    email: {{ $user->email }}
    mobile no: {{ $user->phone }}
    address: {{ $user->address }}
    department name: {{ $user->department->dep_name }}
    password: 123456



    @component('mail::button', ['url' => 'http://127.0.0.1:8000/task'])
        check your Task here
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
