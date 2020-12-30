<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Task-Force: {{$taskForce->name }}
        </h2>
    </x-slot>

    <h3 class="text-cool-gray-800 text-xl font-semibold">Projects</h3>
    @forelse($taskForce->projects as $project )
        <div> {{ $project->name }}</div>
    @empty
        <div>{{$taskForce->name}} has no projects</div>
    @endforelse
</x-app-layout>
