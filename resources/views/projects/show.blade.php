<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Project: {{$project->name }}
            </h2>
            <a href="{{route('new-post', $project)}}" class="bg-pink-500 px-2 rounded-full text-white">+</a>
        </div>
    </x-slot>

    <h3 class="text-cool-gray-800 text-xl font-semibold">Posts</h3>
    @forelse($project->posts as $post)
        <div> <a href="{{route('post', $post)}}">{{ $post->title}}</a></div>
    @empty
        <div>{{$project->name}} has no posts</div>
    @endforelse
</x-app-layout>
