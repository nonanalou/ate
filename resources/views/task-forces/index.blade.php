<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task-forces') }}
        </h2>
    </x-slot>
    <ul>
        @forelse($taskForces as $taskForce )
            <li>
                <a href="{{route('task-force', $taskForce)}}"> {{ $taskForce->name }}</a>
            </li>
        @empty
            <div>no task-force</div>
        @endforelse
    </ul>
</x-app-layout>
