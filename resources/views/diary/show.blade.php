@extends('layouts.main')
@section('content')
    <main>
        <section class="about">
            <div class="about-photo">
                <img src="@if($user[0]->avatar) {{ Storage::disk('public')->url($user[0]->avatar) }}
                @else {{ asset('assets\img\avatar.jpg') }} @endif" alt="">
            </div>
            <div class="about-info">
                <h1>{{ $user[0]->name }} {{ $user[0]->surname }}</h1>
                <div class="about-status"> @if($user[0]->waiting)"в ожидании чуда"
                    @else"чудо появилось на свет"@endif</div>
                @if($user[0]->city)<p>{{ $user[0]->city }}</p>@endif
                @if($user[0]->age)<p>{{$user[0]->age}}
                    @if(substr($user[0]->age, -1) == 1) год
                    @elseif(substr($user[0]->age, -1) > 1 && substr($user[0]->age, -1) < 5) года
                    @else лет</p>@endif
                @endif
                @if($user[0]->about)<p class="about-about">{{$user[0]->about}}</p>@endif

                <div class="about-album-button"><a href="{{ route('album', ['id' => $user[0]->id]) }}" class="post-button">открыть альбом</a></div>
            </div>

        </section>

        <section class="post align">
            @if(Auth::user() && Auth::user()->id == $user[0]->id)
            <div class="post-create">
                <a href="{{ route('posts.create', ['diary' => $user[0]->id]) }}" class="post-button">создать новый пост</a>
                <a href="{{ route('photos.create', ['diary' => $user[0]->id]) }}" class="post-button">вклеить фото</a>
            </div>
            @endif
            <div class="post-posts">
                   @forelse($diary as $post)
                    <div class="block">
                        <div class="block-bant block-bant-{{ $post->theme }}">
                        </div>
                        <div class="block-card {{ $post->theme }}">
                            <div class="block-card-text"><p>{!! $post->text !!}</p>
                            </div>
                            <div class="block-card-bottom block-card-bottom-{{ $post->theme }}">
                                <div class="block-card-bottom-param">
                                    <div class="block-card-bottom-info"><b>Настроение: </b> @if($post->mood) {{ $post->mood }}@endif</div>
                                    <div class="block-card-bottom-info"><b>Самочувствие: </b> @if($post->health) {{ $post->health }}@endif</div>
                                </div>
                                <div class="block-card-bottom-param">
                                    <div class="block-card-bottom-info"><b>Рост: </b> @if($post->ht) {{ $post->ht }} см@endif
                                    </div>
                                    <div class="block-card-bottom-info"><b>Вес: </b> @if($post->kg) {{ $post->kg }} кг@endif
                                        @if($post->gr) {{ $post->gr }} г@endif
                                    </div>
                                    <div class="block-card-bottom-info"><b>Возраст: </b>
                                        @if($post->year)
                                            {{ $post->year }}
                                            @if($post->year == 1) год
                                            @elseif($post->year > 1 && $post->year < 5) года
                                            @else лет
                                            @endif
                                        @endif
                                        @if($post->month)
                                            {{ $post->month }}
                                            @if($post->month == 1) месяц
                                            @elseif($post->month > 1 && $post->month < 5) месяца
                                            @else месяцев
                                            @endif
                                        @endif
                                    </div>
                                    @if(Auth::user() && Auth::user()->id == $user[0]->id)
                                    <div class="edit"><a href="{{ route('posts.edit', ['post' => $post->id]) }}"></a></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="block">
                        <div class="block-bant block-bant-beige"></div>
                        <div class="block-card beige">
                            <p>Статьи в процессе написания, ожидайте.</p>
                        </div>
                    </div>
                    @endforelse
            </div>
            <div class="navigation">
                {{ $diary->links() }}
            </div>
        </section>
    </main>

    <footer class="align">
        <img src="{{ asset('assets\img\slash.png') }}" alt="">
        <div><a href="#top">вверх</a></div>
    </footer>
@endsection
