<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Create Post') }}
            </h2>
        </div>
    </x-slot>
    <div class="w-full max-w-3xl p-4 mx-auto bg-white rounded-md shadow">
        <h3 class="text-2xl font-semibold">Edit Post</h3>
        <form action="/posts/{{$post->id}}" method="post" class="w-full space-y-4">
            @csrf
            {{-- we need to add the patch method (which only updates the changed values) because html dont know the patch method--}}
            @method('PATCH')
            <div>
                <label for="title" class="block">Title</label>
                <x-jet-input class="w-full" type="text" name="title" id="title" value="{{$post->title}}" />
                @error('title')
                <div>{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="content" class="block">Info</label>
                <textarea rows="8" class="w-full rounded form-input" name="content" id="content">{{$post->content}}</textarea>
                @error('content')
                <div>{{$message}}</div>
                @enderror
            </div>
            <x-jet-button>
                Update
            </x-jet-button>
        </form>
    </div>
</x-app-layout>
