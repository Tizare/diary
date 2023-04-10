<header class="align" id="top">
    <div class="logo">
        <a href="@if(Auth::user()) {{ route('diary', ['id' => Auth::user()->id]) }}
        @else {{ route('welcome') }} @endif"><img src="{{ asset('assets\img\logo.png') }}" alt="#"></a>
    </div>
    @if (Route::has('login'))
        <div class="enter">
            @auth
                <a href="{{ url('/profile') }}" class="enter-link">Профиль</a>
            @else
                <a href="{{ route('login') }}" class="enter-link">Войти</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="enter-link">Регистрация</a>
                @endif
            @endauth
        </div>
    @endif
</header>
