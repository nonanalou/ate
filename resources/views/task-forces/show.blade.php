<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Task-Force: {{$taskForce->name }}
        </h2>
    </x-slot>

    <div class="space-y-8">
        <div class="flex items-center justify-between">
            <h3 class="text-3xl text-cool-gray-800">Projects</h3>
            <x-ate-link-button href="{{route('new-project')}}">
                New Project
            </x-ate-link-button>
        </div>
        @if (count($taskForce->projects) > 0)
        <ul class="grid grid-cols-4 gap-8">
            @foreach($taskForce->projects as $project )
            <li class="px-6 py-4 bg-white rounded shadow-sm hover:text-white hover:bg-blue-500">
                <a href="{{route('project', $project)}}">
                    <div class="text-2xl font-medium">
                        {{ $project->name }}
                    </div>
                    <div>Posts: {{ $project->posts()->count() }}</div>
                </a>
            </li>
            @endforeach
        </ul>
        @else
        <div class="flex items-center justify-center w-full h-20 font-semibold text-gray-600">
            {{$taskForce->name}} has no projects
        </div>
        @endif
        <hr>
        <div class="flex items-center justify-between">
            <h3 class="text-3xl text-cool-gray-800">Members</h3>
            <x-ate-link-button href="#">
                Add Member
            </x-ate-link-button>
        </div>
    </div>
</x-app-layout>
