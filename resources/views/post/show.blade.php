@extends('layouts.main')
@section('content')
    <main>
        <section class="post align">
            <div class="post-posts">
                <div class="block">
                    <div class="block-user block-user-{{ $post[0]->theme }}">
                        <div>
                            <a href="{{ route('diary', ['user' => $post[0]->user]) }}">
                                {{ $post[0]->user->name }} {{ $post[0]->user->surname }}</a>
                        </div>
                    </div>

                    <div class="comment-bant block-bant-{{ $post[0]->theme }}">
                    </div>
                    <div class="block-card {{ $post[0]->theme }}">
                        <div class="block-card-text"><p>{!! $post[0]->text !!}</p>
                        </div>
                        <div class="block-card-bottom block-card-bottom-{{ $post[0]->theme }}">
                            <div class="block-card-bottom-param">
                                <div class="block-card-bottom-info">
                                    <b>Настроение: </b> @if($post[0]->mood) {{ $post[0]->mood }}@endif
                                </div>
                                <div class="block-card-bottom-info">
                                    <b>Самочувствие: </b> @if($post[0]->health) {{ $post[0]->health }}@endif
                                </div>
                            </div>
                            <div class="block-card-bottom-param">
                                <div class="block-card-bottom-info">
                                    <b>Рост: </b> @if($post[0]->ht) {{ $post[0]->ht }} см@endif
                                </div>
                                <div class="block-card-bottom-info">
                                    <b>Вес: </b> @if($post[0]->kg) {{ $post[0]->kg }} кг@endif
                                    @if($post[0]->gr) {{ $post[0]->gr }} г@endif
                                </div>
                                <div class="block-card-bottom-info"><b>Возраст: </b>
                                    @if($post[0]->year)
                                        {{ $post[0]->year }}
                                        @if($post[0]->year == 1) год
                                        @elseif($post[0]->year > 1 && $post[0]->year < 5) года
                                        @else лет
                                        @endif
                                    @endif
                                    @if($post[0]->month)
                                        {{ $post[0]->month }}
                                        @if($post[0]->month == 1) месяц
                                        @elseif($post[0]->month > 1 && $post[0]->month < 5) месяца
                                        @else месяцев
                                        @endif
                                    @endif
                                </div>
                                @if(Auth::user() && Auth::user()->id == $post[0]->user_id)
                                    <div class="edit"><a href="{{ route('posts.edit', ['post' => $post[0]->id]) }}"></a></div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if(Auth::user())
            <div class="comment-create-block">
                <label class="comment-label" for="comment-create">
                    <input class="comment-check" type="checkbox" id="comment-create">
                    <div class="post-button hidden-button">Комментировать</div>
                    <div class="comment-create-form">
                        <form method='post' action='{{ route('comment.store', ['user' => Auth::user(), 'post' => $post[0] ]) }}'>
                            @csrf
                            <textarea type='text' class="comment-write" name="comment" id="comment-write"></textarea>
                        <div class="comment-create-button">
                            <button type="submit" class="post-button">Сохранить</button>
                            <label for="comment-create" class="post-button">Отмена</label>
                        </div>
                        </form>
                    </div>
                </label>
            </div>
        @endif
        <section class="comments">
            @forelse($post[0]->comments as $comment)
                @if($comment->user)
                <div class="comments-block comments-block-{{$comment->user->theme}}">
                    <div class="comments-user comment-{{$comment->user->theme}}">
                        <div class="comments-user-avatar">
                            <a href="{{ route('diary', ['user' => $comment->user]) }}">
                                <img src=" @if($comment->user->avatar) {{ Storage::disk('public')->url($comment->user->avatar) }}
                                            @else {{ asset('assets\img\avatar.jpg') }} @endif">
                            </a>
                        </div>
                        <div class="comments-user-data">{{ $comment->user->name }}</div>
                        @if($comment->user->city && $comment->user->age)
                            <div class="comments-user-data">({{ $comment->user->city }}, {{$comment->user->age}})</div>
                        @endif
                        <div class="comments-user-data">@if($comment->user->waiting) в процессе @else уже @endif</div>
                    </div>
                    <div class="comments-text">
                        <div class="comments-date">
                            {!! goodDate($comment->created_at) !!} г.
                        </div>
                        <p>{!! $comment->comment !!}</p>
                    </div>
                    <div class="card-desc-stick card-desc-stick1"></div>
                    <div class="card-desc-stick card-desc-stick2"></div>
                    <div class="card-desc-img">
                        <img src="{{ asset('assets\img\hurt.png') }}" alt="">
                    </div>
                </div>
                @else
                    <div class="comments-block comments-block-beige">
                        <div class="comments-user comment-beige">
                            <div class="comments-user-avatar">
                                    <img src=" {{ asset('assets\img\avatar.jpg') }}">
                            </div>
                            <div class="comments-user-data">Незнакомец</div>
                        </div>
                        <div class="comments-text">
                            <div class="comments-date">
                                {!! goodDate($comment->created_at) !!} г.
                            </div>
                            <p>{!! $comment->comment !!}</p>
                        </div>
                        <div class="card-desc-stick card-desc-stick1"></div>
                        <div class="card-desc-stick card-desc-stick2"></div>
                        <div class="card-desc-img">
                            <img src="{{ asset('assets\img\hurt.png') }}" alt="">
                        </div>
                    </div>
                @endif
            @empty
                <div class="comments-block comments-block-{{ $post[0]->theme }}">
                    Комментарии в процессе написания и скоро появятся, ожидайте!
                    <div class="card-desc-stick card-desc-stick1"></div>
                    <div class="card-desc-stick card-desc-stick2"></div>
                    <div class="card-desc-img">
                        <img src="{{ asset('assets\img\hurt.png') }}" alt="">
                    </div>
                </div>
            @endforelse
        </section>
    </main>

    <footer class="diary-footer align">
        <img src="{{ asset('assets\img\slash.png') }}" alt="">
        <div><a href="#top">вверх</a></div>
    </footer>

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('comment-write', options);
    </script>
    <link href="{{ asset('assets\css\comment-editor.css') }}" rel="stylesheet">

    @php
        function goodDate(string $string): string
        {
            return mb_substr($string, 8, 2) . '.' . mb_substr($string, 5, 2) . '.' . mb_substr($string, 0, 4);
        }
    @endphp
@endsection

