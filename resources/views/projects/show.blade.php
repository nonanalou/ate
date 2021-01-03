<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                <a class="hover:text-blue-400" href="{{route('task-force', $project->owner)}}">{{ $project->owner->name }}</a> / {{$project->name }}
            </h2>
        </div>
    </x-slot>
    <div class="space-y-8 rounded-md">
        <div class="space-y-2">
            <h3 class="mb-4 text-3xl text-cool-gray-800">Short description</h3>
            <div class="prose">
                {{ $project->shortDescription }}
            </div>
        </div>
        <hr>
        <div class="space-y-2">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-3xl text-cool-gray-800">Posts</h3>
                <x-ate-link-button class="flex items-center space-x-2" href="{{route('new-post', $project)}}">
                    New Post
                </x-ate-link-button>
            </div>
            <ul class="grid grid-cols-2 gap-4 md:grid-cols-3">
                @forelse($project->posts as $post)
                <li class="flex flex-col px-6 py-4 bg-white border rounded-md shadow-sm hover:text-white hover:bg-blue-500">
                    <a class="block space-y-2" href="{{route('post', $post)}}">
                        <div class="flex items-center space-x-2">
                            <img class="w-10 h-10 rounded-full" src="{{$post->author->profile_photo_url}}" alt="{{ $post->author->name }}">
                            <div class="text-2xl font-bold">{{ $post->title}}</div>
                        </div>
                        <div class="text-sm">Published by {{ $post->author->name }} at {{ $post->published }}</div>
                        <p class="flex-grow">{{ substr($post->content, 0, 89) }}...</p>
                    </a>
                </li>
                @empty
                <div>{{$project->name}} has no posts</div>
                @endforelse
            </ul>
        </div>
    </div>
</x-app-layout>
