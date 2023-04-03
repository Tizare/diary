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
{{--        @dd($album)--}}
    <div class="top album-back album-back-{{ $album[0]->theme }} ">
        <div class="center">
            <x-header></x-header>
            @foreach($album[0]->photos as $photo)
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
                            <div class="card-background card-background-{{ $album[0]->theme }}"></div>
                            <div class="card-sticker align">
                                01.05.2023
                                <div class="card-sticker-background card-sticker-background-{{ $album[0]->theme }}"></div>
                            </div>
                            <div class="card-image">
                                <img src="{{ $photo->url }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="card-desc card-desc-{{ $album[0]->theme }}">
                        {{ $photo->desc }}
                        <div class="card-desc-stick card-desc-stick1"></div>
                        <div class="card-desc-stick card-desc-stick2"></div>
                        <div class="card-desc-img">
                            <img src="{{ asset('assets\img\hurt.png') }}" alt="">
                        </div>
                    </div>

                </div>

            @endforeach
        </div>

    </div>
</div>

</body>
</html>
