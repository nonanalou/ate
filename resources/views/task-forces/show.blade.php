<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Task-Force: {{$taskForce->name }}
        </h2>
    </x-slot>

    <div class="space-y-8">
        <div class="flex items-center justify-between">
            <h3 class="text-3xl text-cool-gray-800">Projects</h3>
            @can('create', [App\Models\Project::class, $taskForce]);
            <x-ate-link-button href="{{route('new-project', $taskForce)}}">
                New Project
            </x-ate-link-button>
            @endcan
        </div>
        @if (count($taskForce->projects) > 0)
        <ul class="grid grid-cols-4 gap-8">
            @foreach($taskForce->projects as $project )
            <li class="px-6 py-4 bg-white rounded shadow-md hover:text-white hover:bg-blue-500">
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
            @can('create', App\Models\TaskForceMembership::class);
            <x-ate-link-button href="{{ route('new-task-force-member', $taskForce) }}">
                Add Member
            </x-ate-link-button>
            @endcan
        </div>
        <ul class="grid grid-cols-4 gap-4">
            @foreach($taskForce->members as $member)
            <li class="p-2 bg-white rounded-md shadow-md">
                <div class="flex items-center space-x-3">
                    <div><img class="rounded-full" width="40" height="40" src="{{$member->profile_photo_url}}" alt="{{$member->name}}"></div>
                    <div class="font-semibold">
                        {{$member->name}}
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
