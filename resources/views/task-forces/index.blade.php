<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Task-forces') }}
            </h2>
            @can('create', \App\Models\TaskForce::class)
            <x-ate-link-button href="{{route('new-task-force')}}">New Taskforce</x-ate-link-button>
            @endcan
        </div>
    </x-slot>
    <ul class="grid grid-cols-4 gap-4">
        @forelse($taskForces as $taskForce )
        <li class="overflow-hidden bg-white rounded shadow hover:bg-blue-500 hover:text-white">
            <a class="block px-6 py-4 space-y-4" href="{{route('task-force', $taskForce)}}">
                <div class="text-xl font-bold">
                    {{ $taskForce->name }}
                </div>
                <div>
                    <div class="text-sm font-semibold">Members</div>
                    <div class="relative z-0 flex p-1 -space-x-1 overflow-hidden">
                        @foreach($taskForce->members as $member)
                        <img class="relative z-30 inline-block w-6 h-6 rounded-full ring-2 ring-white" src="{{$member->profile_photo_url}}" alt="">
                        @endforeach
                    </div>
                </div>
            </a>
        </li>
        @empty
        <div>no task-force</div>
        @endforelse
    </ul>
</x-app-layout>
