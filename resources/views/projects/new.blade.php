<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Create Project') }}
            </h2>
        </div>
    </x-slot>
    <div class="w-full max-w-lg p-8 mx-auto bg-white rounded shadow">
        <h3 class="text-2xl font-semibold">New Project</h3>
        <form action="{{route('store-project')}}" method="post" class="w-full space-y-4">
            @csrf
            <div>
                <label for="name" class="block font-semibold">Name</label>
                <x-jet-input class="w-full" type="text" name="name" id="name" value="{{old('name')}}" />
                @error('name')
                <div>{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="shortDescription" class="block font-semibold">short Description</label>
                <x-jet-input class="w-full" type="text" name="shortDescription" id="shortDescription" value="{{old('shortDescription')}}" />
                @error('shortDescription')
                <div>{{$message}}</div>
                @enderror
            </div>
            <div>
                <select class="w-full rounded" name="owner" id="owner">
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
