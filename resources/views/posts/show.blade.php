<x-app-layout>
    <x-slot name="header">
        <a class="font-semibold text-blue-500" href="{{route('project', $post->parentProject)}}">
            Back to {{ $post->parentProject->name }}
        </a>
    </x-slot>
    <div class="max-w-3xl mx-auto space-y-6">
        <div class="max-w-full p-8 space-y-4 bg-white rounded-md shadow-sm">
            <div class="flex items-center justify-between">
                <h2 class="text-3xl font-bold">
                    {{$post->title}}
                </h2>
                <div>
                    <x-ate-link-secondary-button href="#">
                        Edit
                    </x-ate-link-secondary-button>
                </div>
            </div>
            <div class="prose prose-lg">
                <p>
                    {{ $post->content }}
                </p>
            </div>
            <div class="flex">
                @forelse($post->attachments as $attachment)
                @if($attachment->type === 'image/png' || $attachment->type === 'image/jpg')
                <a href="{{ $attachment->url() }}">
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
                    <div>Published at {{$post->published}}</div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
