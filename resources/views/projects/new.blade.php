<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Project') }}
            </h2>
        </div>
    </x-slot>
    <div class="mx-auto max-w-lg w-full">
        <form action="{{route('store-project')}}" method="post" class="space-y-4">
        @csrf
            <div>
                <label for="name" class="block">Name</label>
                <x-jet-input type="text" name="name" id="name" value="{{old('name')}}"/>
                @error('name')
                <div>{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="shortDescription" class="block">short Description</label>
                <x-jet-input type="text" name="shortDescription" id="shortDescription" value="{{old('shortDescription')}}"/>
                @error('shortDescription')
                <div>{{$message}}</div>
                @enderror
            </div>
            <div>
                <select name="owner" id="owner">
                    <option value="null" selected disabled>Please choose a Task-Force</option>
                    @foreach ($taskForces as $taskForce)
                    <option value="{{$taskForce->id}}">{{$taskForce->name}}</option>
                    @endforeach
                </select>
                @error('owner')
                <div>{{$message}}</div>
                @enderror
            </div>
            <x-jet-button>
                create
            </x-jet-button>
        </form>
    </div>
</x-app-layout>
