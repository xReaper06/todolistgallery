<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        <div class="border border-gray-200 rounded-lg p-4 m-4 bg-white shadow-md">
                            <div class="flex justify-between">
                                <div class="flex w-full">
                                    <h2 class="text-gray-900 font-bold text-lg w-full">Job Name: {{ $todolist->name }}</h2>
                                    <h2 class="text-gray-900 font-bold text-lg w-full">Start: {{ $todolist->start }}</h2>
                                    <h2 class="text-gray-900 font-bold text-lg w-full">End: {{ $todolist->end }}</h2>
                                    <p class="text-gray-500 text-sm w-full">Status: {{ $todolist->status }}</p>
                                    <a href="{{ route('todolist.edit',$todolist->id) }}">
                                        <button class="btn btn-primary me-2"><i class="fas fa-calendar"></i></button>
                                    </a>
                                    <form action="{{ route('todolist.destroy', $todolist->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-black hover:text-blue-300 btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
