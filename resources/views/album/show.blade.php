<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets\css\style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alkatra&display=swap" rel="stylesheet">
    <title>album</title>
</head>
<body>
<div class="wrapper">
    <div class="top album-back album-back-@if($album[0]){{ $album[0]->user->theme }}@else beige @endif ">
        <div class="center">
            <x-header></x-header>
            @forelse($album as $photo)
            <div class="card align">
                <div class="card-main">
                    <div class="align">
                        <div class="card-note">
                            {{ $photo->title }}
                            <div class="card-note-stick card-note-stick1"></div>
                            <div class="card-note-stick card-note-stick2"></div>
                            <div class="card-note-background"></div>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="card-background card-background-{{ $photo->user->theme }}"></div>
                        <div class="card-sticker align">
                            {{ goodDate($photo->created_at) }} г.
                            <div class="card-sticker-background card-sticker-background-{{ $photo->user->theme }}"></div>
                        </div>
                        <div class="card-image">
                            <img src="{{ Storage::disk('public')->url($photo->url) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="card-desc card-desc-{{ $photo->user->theme }}">
                    {{ $photo->desc }}
                    <div class="card-desc-stick card-desc-stick1"></div>
                    <div class="card-desc-stick card-desc-stick2"></div>
                    <div class="card-desc-img">
                        <img src="{{ asset('assets\img\hurt.png') }}" alt="">
                    </div>
                </div>

            </div>
            @empty
                <div class="card align">
                    <div class="card-main">
                        <div class="align">
                            <div class="card-note">
                                Хымммм... <br>
                                Фото скоро вклеются, ожидайте!
                                <div class="card-note-stick card-note-stick1"></div>
                                <div class="card-note-stick card-note-stick2"></div>
                                <div class="card-note-background"></div>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="card-background card-background-beige"></div>
                            <div class="card-sticker align">
                                быть может...
                                <div class="card-sticker-background card-sticker-background-beige"></div>
                            </div>
                            <div class="card-image">
                            </div>
                        </div>
                    </div>
                </div>

            @endforelse
            <div class="navigation">
                {{ $album->links() }}
            </div>
        </div>

    </div>
</div>
@php
function goodDate(string $string): string
{
    return mb_substr($string, 8, 2) . '.' . mb_substr($string, 5, 2) . '.' . mb_substr($string, 0, 4);
}
@endphp
</body>
</html>
