<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Post') }}
            </h2>
        </div>
    </x-slot>
    <div class="mx-auto max-w-lg w-full">
        <form action="{{route('store-post', $project)}}" method="post" class="space-y-4">
        @csrf
            <div>
                <label for="title" class="block">Title</label>
                <x-jet-input type="text" name="title" id="title" value="{{old('title')}}"/>
                @error('title')
                <div>{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="content" class="block">Info</label>
                <x-jet-input type="text" name="content" id="content" value="{{old('content')}}"/>
                @error('content')
                <div>{{$message}}</div>
                @enderror
            </div>
            <x-jet-button>
                create
            </x-jet-button>
        </form>
    </div>
</x-app-layout>
