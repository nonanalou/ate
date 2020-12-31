<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Post: {{$post->title}}
        </h2>
        <a href="{{route('project', $post->parentProject)}}">back</a>
    </x-slot>
    <p>{{$post->author->name}}</p>
    <div>
        {{$post->content}}
    </div>

</x-app-layout>
