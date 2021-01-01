<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Task-forces') }}
        </h2>
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
                        <!-- todo replace with members -->
                        <img class="relative z-30 inline-block w-6 h-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        <img class="relative z-20 inline-block w-6 h-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        <img class="relative z-10 inline-block w-6 h-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80" alt="">
                        <img class="relative z-0 inline-block w-6 h-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </div>
                </div>
            </a>
        </li>
        @empty
        <div>no task-force</div>
        @endforelse
    </ul>
</x-app-layout>
