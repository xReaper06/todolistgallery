<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('todolist.create') }}" class="btn btn-danger"><i class="fas fa-solid fas fa-plus"></i><span class="pe-2"></span><i class="fas fa-sharp fas fa-solid fas fa-list"></i></a>
                <h1 class="text-center font-bold text-xl">Todo List</h1>
                </div>
                <div class="p-6 text-gray-900">
                    @foreach ($Todolists as $Todolist )
                    <a href="{{ route('todolist.show',$Todolist->id) }}">
                        <div class="border border-gray-200 rounded-lg p-4 m-4 bg-white shadow-md">
                            <div class="flex justify-between">
                                <div class="flex w-full">
                                    <h2 class="text-gray-900 font-bold text-lg w-full">Job Name: {{ $Todolist->name }}</h2>
                                    <h2 class="text-gray-900 font-bold text-lg w-full">Start: {{ $Todolist->start }}</h2>
                                    <h2 class="text-gray-900 font-bold text-lg w-full">End: {{ $Todolist->end }}</h2>
                                    <p class="text-gray-500 text-sm w-full">Status: {{ $Todolist->status }}</p>
                                    <form action="{{ route('todolist.start',$Todolist->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button class="btn btn-danger me-3"><i class="fas fa-regular fas fa-play"></i></button>
                                </form>
                                <form action="{{ route('todolist.end',$Todolist->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button class="btn btn-secondary"><i class="fas fa-regular fas fa-stop"></i></button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
