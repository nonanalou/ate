<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a class="hover:text-blue-400" href="{{route('task-force', $post->parentProject->owner)}}">{{ $post->parentProject->owner->name }}</a> /
            <a class="hover:text-blue-400" href="{{route('project', $post->parentProject)}}">{{ $post->parentProject->name }}</a> / {{$post->title}}
        </h2>
    </x-slot>
    <div class="max-w-3xl mx-auto space-y-6">
        <div class="max-w-full p-8 space-y-4 bg-white rounded-md shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-bold">
                        {{$post->title}}
                    </h2>
                </div>
                <div>
                    @can('update', [$post, $post->parentProject->owner])
                    <x-ate-link-secondary-button href="{{route('edit-post', $post)}}">
                        Edit
                    </x-ate-link-secondary-button>
                    @endcan
                </div>
            </div>
            <div class="prose prose-lg">
                <p>
                    {{ $post->content }}
                </p>
            </div>
            <div class="flex">
                @forelse($post->attachments as $attachment)
                @if($attachment->type === 'image/png' || $attachment->type === 'image/jpeg')
                <a href="{{ $attachment->url() }}" target="_blank">
                    <img width="100" height="100" src="{{ $attachment->url() }}" alt="{{$attachment->name}}">
                </a>
                @elseif($attachment->type === 'application/pdf' || $attachment->type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
                <a href="{{ $attachment->url() }}">{{ $attachment->name }}</a>
                @endif
                @empty
                @endforelse
            </div>
            <div class="flex items-center p-2 space-x-2 bg-gray-100 rounded">
                <img class="w-12 h-12 border-2 border-white rounded-full" src="{{ $post->author->profile_photo_url }}" alt="{{ $post->author->name }}">
                <div class="text-sm">
                    <div class="font-semibold">Written by {{ $post->author->name }}</div>
                    <div>Published on {{$post->published}} <a href="{{route('project', $post->parentProject)}}">{{'@'.$post->parentProject->name}}</a></div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
