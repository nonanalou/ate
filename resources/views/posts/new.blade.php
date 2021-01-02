<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Create Post') }}
            </h2>
        </div>
    </x-slot>
    <div class="w-full max-w-3xl p-4 mx-auto bg-white rounded-md shadow">
        <h3 class="text-2xl font-semibold">New Post</h3>
        <form action="{{route('store-post', $project)}}" method="post" class="w-full space-y-4" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title" class="block">Title</label>
                <x-jet-input class="w-full" type="text" name="title" id="title" value="{{old('title')}}" />
                @error('title')
                <div class="text-sm text-red-500">{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="content" class="block">Info</label>
                <textarea rows="8" class="w-full rounded form-input" name="content" id="content" value="{{old('content')}}"></textarea>
                @error('content')
                <div class="text-sm text-red-500">{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="attachments">Attachments</label>
                <input type="file" value="{{old('attachments')}}" multiple name="attachments[]" id="attachments">
            </div>
            @error('attachments.*')
            <div class="text-sm text-red-500">{{$message}}</div>
            @enderror
            <x-jet-button>
                create
            </x-jet-button>
        </form>
    </div>
</x-app-layout>
