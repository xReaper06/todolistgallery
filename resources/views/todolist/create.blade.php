<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Todo List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>The Start should be advance from this day and the the due date should be greater than the Starting date or it will return an error</p>
                    <form method="post" action="{{ route('todolist.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-error">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="container flex justify-center">
                            <div class="form-group mb-4 p-3">
                                <label for="start">Start</label>
                                <input class="form-control" type="date" name="start" id="start">
                            </div>
                            <div class="form-group mb-4 p-3">
                                <label for="end">Supposed to End</label>
                                <input class="form-control" type="date" name="end" id="end">
                            </div>
                            <div class="form-group mb-4 p-3">
                                <label for="name">Job Name</label>
                                <input class="form-control" type="text" name="name" id="name">
                            </div>
                            <button type="submit" class="border-solid bg-sky-800 hover:text-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
