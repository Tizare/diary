@extends('layouts.main')
@section('content')
    <main class="welcome-main align">
        <h2>Добро пожаловать в&nbsp;Твой дневник!</h2>
        <div class="main-block">
            <div class="main-card">
                <h4>Новенькие</h4>
                <div class="card-desc-img">
                    <img src="{{ asset('assets\img\hurt.png') }}" alt="">
                </div>
                @foreach($last_users as $user)
                    <a href="{{ route('diary', ['user' => $user->id]) }}">
                    <div class="main-card-user">
                        <div class="main-card-user-photo">
                            <img src="@if($user->avatar) {{ Storage::disk('public')->url($user->avatar) }}
                                        @else {{ asset('assets\img\avatar.jpg') }} @endif" alt="">
                        </div>
                        <div class="main-card-user-info">
                            <p><b>{{ $user->name }} {{ $user->surname }}</b></p>
                            <p>{{ $user->city }}</p>
                            <p>{{ $user->age }}</p>
                            <p>@if($user->waiting)в ожидании @else родила @endif</p>
                        </div>
                    </div>
                    </a>
                @endforeach

            </div>

            <div class="line-between"></div>

            <div class="main-card">
                <h4>В ожидании</h4>
                @foreach($waiting as $user)
                    <a href="{{ route('diary', ['user' => $user->id]) }}">
                        <div class="main-card-user">
                            <div class="main-card-user-photo">
                                <img src="@if($user->avatar) {{ Storage::disk('public')->url($user->avatar) }}
                                        @else {{ asset('assets\img\avatar.jpg') }} @endif" alt="">
                            </div>
                            <div class="main-card-user-info">
                                <p><b>{{ $user->name }} {{ $user->surname }}</b></p>
                                <p>{{ $user->city }}</p>
                                <p>{{ $user->age }}</p>
                                <p>@if($user->waiting)в ожидании @else родила @endif</p>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>

            <div class="line-between"></div>

            <div class="main-card">
                <div class="main-card-bant block-bant-pink"></div>
                <h4>Родившие</h4>
                @foreach($ready as $user)
                    <a href="{{ route('diary', ['user' => $user->id]) }}">
                        <div class="main-card-user">
                            <div class="main-card-user-photo">
                                <img src="@if($user->avatar) {{ Storage::disk('public')->url($user->avatar) }}
                                        @else {{ asset('assets\img\avatar.jpg') }} @endif" alt="">
                            </div>
                            <div class="main-card-user-info">
                                <p><b>{{ $user->name }} {{ $user->surname }}</b></p>
                                <p>{{ $user->city }}</p>
                                <p>{{ $user->age }}</p>
                                <p>@if($user->waiting)в ожидании @else родила @endif</p>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>

        </div>
        <img class="main-background" src="{{ asset('assets/img/teddyhurtpink.jpg') }}">
    </main>
@endsection

