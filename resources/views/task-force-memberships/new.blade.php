<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Add Member') }}
            </h2>
        </div>
    </x-slot>
    <div class="w-full max-w-lg p-8 mx-auto bg-white rounded shadow">
        <h3 class="text-2xl font-semibold">Add Member</h3>
            <ul class="divide-y divide-gray-200">
            @foreach ($users as $user)
            <li class="py-4 flex">
                <img class="w-12 h-12 border-2 border-white rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                <div class="ml-3">
                <p class="text-sm font-medium text-gray-900">{{$user->name}} </p>
                <p class="text-sm text-gray-500">{{$user->email}}</p>
                <form action="{{ route('store-task-force-member', $taskForce) }}" method="post">
                @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <x-jet-button>
                        Add
                    </x-jet-button>
                </form>
                </div>
            </li>
            @endforeach
            </ul>
    </div>
</x-app-layout>
