<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task-forces') }}
        </h2>
    </x-slot>
    @forelse($taskForces as $taskForce )
        <a href="{{route('task-force', $taskForce)}}"> {{ $taskForce->name }}</a>
    @empty
        <div>no task-force</div>
    @endforelse
</x-app-layout>
