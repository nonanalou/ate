<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $taskForce->name }}
        </h2>
    </x-slot>

    @forelse($taskForce->projects as $project )
        <div> {{ $project->name }}</div>
    @empty
        <div>{{$taskForce->name}} has no projects</div>
    @endforelse
</x-app-layout>
