<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Todo List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('todolist.index') }}">{{ __('Go back now') }}</a>
                    <form method="post" action="{{ route('todolist.update',$todolist->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="container flex justify-center">
                            <div class="form-group mb-4 p-3">
                                <label for="end">End</label>
                                <input class="form-control @error('end')
                                border-red-500 @enderror border-gray-200 rounded p-2 w-full"
                                type="date" value="{{ $todolist->end }}" name="end"/>
                                @error('end')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                            </div>
                            <div class="form-group mb-4 p-3">
                                <label for="name">Job Name</label>
                                <input class="form-control  @error('name')
                                border-red-500 @enderror border-gray-200 rounded p-2 w-full"
                                type="text" value="{{ $todolist->name }}" name="name"/>
                                @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                            </div>
                            <button type="submit" class="border-solid bg-sky-800 hover:text-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
