<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container flex justify-center">
                        <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                            @csrf
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <input type="file" class="bg-sky-500" name="image" />
                            <div class="pt-3">
                                <button type="submit" class="text-black hover:text-white btn btn-primary bg-sky-500">Upload</button>
                            </div>
                            <div class="pt-3 border-solid bg-sky-600 hover:bg-slate-700">
                                <a href="{{ route('gallery.index') }}">Go back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
