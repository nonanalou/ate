<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Create Taskforce') }}
            </h2>
        </div>
    </x-slot>
    <div class="w-full max-w-lg p-8 mx-auto bg-white rounded shadow">
        <h3 class="text-2xl font-semibold">New Task-Force</h3>
        <form action="{{route('store-task-force')}}" method="post" class="w-full space-y-4">
            @csrf
            <div>
                <label for="name" class="block font-semibold">Name</label>
                <x-jet-input class="w-full" type="text" name="name" id="name" value="{{old('name')}}" />
                @error('name')
                <div>{{$message}}</div>
                @enderror
            </div>
            <x-jet-button>
                create
            </x-jet-button>
        </form>
    </div>
</x-app-layout>
