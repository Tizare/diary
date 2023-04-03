@extends('layouts.main')
@section('content')
    <main>
        <section class="about">
            <div class="about-photo">
                <img src="{{ asset('assets\img\avatar.jpg') }}" alt="">
            </div>
            <div class="about-info">
                <h1>{{ $diary[0]->name }} {{ $diary[0]->surname }}</h1>
                @if($diary[0]->city)<p>{{ $diary[0]->city }}</p>@endif
                @if($diary[0]->age)<p>30 лет</p>@endif
                <div class="about-status"> @if($diary[0]->waiting)"в ожидании чуда"
                    @else"чудо появилось на свет"@endif</div>
                <a href="{{ route('album', ['id' => $diary[0]->id]) }}" class="post-button">открыть альбом</a>
            </div>

        </section>

        <section class="post align">

            <div class="post-create">
                <a href="" class="post-button">создать новый пост</a>
                <a href="" class="post-button">вклеить фото</a>
            </div>
            <div class="post-posts">
                   @forelse($diary[0]->posts as $post)
                    <div class="block">
                        <div class="block-bant block-bant-{{ $post->theme }}">
                        </div>
                        <div class="block-card {{ $post->theme }}">
                            <div class="block-card-text"><p>{{ $post->text }}</p>
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
        </section>
    </main>

    <footer class="align">
        <img src="{{ asset('assets\img\slash.png') }}" alt="">
        <div><a href="#top">вверх</a></div>
    </footer>
@endsection
