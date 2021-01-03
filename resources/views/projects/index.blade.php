<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Projects') }}
            </h2>
        </div>
    </x-slot>
    <ul class="grid grid-cols-4 gap-4">
        @forelse($projects as $project )
        <li class="bg-white rounded-md shadow-sm hover:text-white hover:bg-blue-500">
            <a class="block p-4 space-y-2" href="{{route('project', $project)}}">
                <div class="text-2xl font-bold">{{ $project->name }}</div>
                <div>
                    {{ $project->shortDescription }}
                </div>
                <div><span class="font-bold">Posts: </span>{{ $project->posts()->count() }}</div>
            </a>
        </li>
        @empty
        <div>no projects</div>
        @endforelse
    </ul>
</x-app-layout>
