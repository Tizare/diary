<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="photo-container">
                        @forelse($photos as $photo)
                            <div class="photo-card">
                                <div class="photo-block">
                                    <img src="{{ Storage::disk('public')->url($photo->url) }}" alt="">
                                </div>
                                <div class="photo-title">
                                    {{ $photo->title }}
                                </div>
                                <div class="edit">
                                    <a href="{{ route('photos.edit', ['photo' => $photo->id]) }}"></a>
                                </div>
                            </div>
                        @empty
                            <div>У Вас пока нет фотографий, но всё в ваших руках!</div>
                        @endforelse
                    </div>




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
