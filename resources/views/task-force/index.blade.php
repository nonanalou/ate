<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('task-force') }}
        </h2>
    </x-slot>
    @foreach ($taskForces as $taskForce )
        <div> {{ $taskForce->name }}</div>
    @endforeach
</x-app-layout>
