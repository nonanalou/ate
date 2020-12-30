<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Project: {{$project->name }}
        </h2>
    </x-slot>

    <h3 class="text-cool-gray-800 text-xl font-semibold">Posts</h3>
    @forelse($project->posts as $post)
        <div> {{ $post->title}}</div>
    @empty
        <div>{{$project->name}} has no posts</div>
    @endforelse
</x-app-layout>
