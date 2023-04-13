<section >

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Имя')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                          :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="surname" :value="__('Фамилия')" />
            <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full"
                          :value="old('surname', $user->surname)"  autofocus autocomplete="surname" />
            <x-input-error class="mt-2" :messages="$errors->get('surname')" />
        </div>

        <div>
            <x-input-label for="age" :value="__('Возраст')" />
            <x-text-input id="age" name="age" type="text" class="mt-1 block w-full"
                          :value="old('age', $user->age)"  autofocus autocomplete="age" />
            <x-input-error class="mt-2" :messages="$errors->get('age')" />
        </div>

        <div>
            <x-input-label for="city" :value="__('Город')" />
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full"
                          :value="old('city', $user->city)"  autofocus autocomplete="city" />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                          :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="theme" :value="__('Тема')" />
            <select id="theme" name="theme" class="mt-1 block w-full border-gray-300 focus:border-pink-500 focus:ring-pink-500 rounded-md shadow-sm ">
                @foreach($themes as $theme)
                    <option @if(old('theme') === $theme) selected
                            @elseif($user->theme === $theme) selected
                            @endif value="{{ $theme }}">{{ $theme }}</option>
                @endforeach
            </select>
        </div>

        <div class="profile-radio">
            <div class="profile-radio-block">
                <x-input-label for="waiting" :value="__('Я беременна')" />
                <input class="radio-waiting" id="waiting" name="waiting" type="radio" value="1" @if($user->waiting) checked @endif>
            </div>
            <div class="profile-radio-block">
                <x-input-label for="waiting-not" :value="__('Я уже родила')" />
                <input class="radio-waiting" id="waiting-not" name="waiting" type="radio" value="0" @if(!$user->waiting) checked @endif>
            </div>

        </div>

        <div>
            <x-input-label for="about" :value="__('О себе')" />
            <x-text-input id="about" name="about" type="text" class="mt-1 block w-full"
                          :value="old('city', $user->about)"  autofocus autocomplete="about" />
            <x-input-error class="mt-2" :messages="$errors->get('about')" />
        </div>

        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" id="image" name="image" class="form-control" >
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Сохранить') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Сохранено.') }}</p>
            @endif
        </div>
    </form>
</section>
