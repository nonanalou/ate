
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('projects') }}
            </h2>
            <a href="{{route('new-project')}}" class="bg-pink-500 px-2 rounded-full text-white">+</a>
        </div>
    </x-slot>
    @forelse($projects as $project )
        <div> {{ $project->name }}</div>
    @empty
        <div>no projects</div>
    @endforelse
</x-app-layout>
