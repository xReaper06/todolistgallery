@props(['gallery'])

<x-card class="p-6">
    <div class="flex">
        <div>
            <h3 class="text-2xl">
                <a href="/gallery/{{ $gallery->id }}">
                    <img class="w-48 mr-6 md:block" src="images/{{ $gallery->imagepath }}" alt="" />
                </a>
            </h3>
        </div>
    </div>
</x-card>
