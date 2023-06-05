<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-500 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container flex justify-end">
                       <a href="/gallery/create" class="btn btn-success" title="Add Image to the gallery"><i class="fas fa-solid fas fa-plus"></i><span class="pe-3"></span><i class="fas fa-solid fas fa-image"></i></a>
                    </div>
                    <div class="flex flex-wrap bg-slate-900">
                        @foreach($gallerys as $gallery)
                        <div class="w-64 rounded-lg shadow-lg p-4 mx-2 my-2">
                            <img src="{{ asset('storage/'.$gallery->imagepath) }}" alt="Image" style="width: 250px; height: 250px;">
                            <div class="p-4">
                                <p>Date Uploaded: {{ $gallery->created_at }}</p>
                            </div>
                            <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-black hover:text-blue-300 btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
