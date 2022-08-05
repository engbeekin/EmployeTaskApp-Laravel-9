<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>

            @foreach (Auth::user()->unreadNotifications as $noti)
                <p>{{ $noti->data['task_name'] }}</p>
                <span>{{ $noti->data['created_by'] }}</span>
                <span>{{ $noti->created_at }}</span>
            @endforeach

        </div>
    </div>

</x-app-layout>
