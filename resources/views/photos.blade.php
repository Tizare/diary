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
                                    <label for="delete-check-{{ $photo->id }}" class="delete-label">
                                        <input id="delete-check-{{ $photo->id }}" class="delete-check" type="checkbox">
                                        <span><br>x<br></span></span>
                                        <div class="click">
                                            <div class="click-block">
                                                <div>Вы точно хотите удалить это фото?</div>
                                                <form method="post" action="{{ route('photos.destroy', ['photo' => $photo->id]) }}" >
                                                    @csrf
                                                    @method('delete')
                                                    <button class="delete-button">Удалить</button>
                                                </form>
                                                <label for="delete-check-{{ $photo->id }}" class="delete-button">Отмена</label>
                                            </div>
                                        </div>
                                    </label>
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
        <div class="post-create">
            <a href="{{ route('posts.create', ['diary' => Auth::user()->id]) }}" class="post-button">создать новый пост</a>
            <a href="{{ route('photos.create', ['diary' => Auth::user()->id]) }}" class="post-button">вклеить фото</a>
        </div>

</x-app-layout>



