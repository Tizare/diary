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
                        <div class="block-bant block-bant-{{ $post->theme }}"></div>
                        <div class="block-card {{ $post->theme }}">
                            <p>{{ $post->text }}</p>
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
