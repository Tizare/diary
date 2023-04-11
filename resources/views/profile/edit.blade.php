<x-app-layout>
    <div class="wrapper">
        <div class="top center">
            <div class="profile-container">
                <div class="profile-block-left align">
                    <div class="profile-avatar">
                        <img src="@if($user->avatar) {{ Storage::disk('public')->url($user->avatar) }}
                @else {{ asset('assets\img\avatar.jpg') }} @endif" alt="">
                    </div>
                    <div class="profile-password">
                        <div class="profile-password-block">
                            <div class="profile-title"><b>Изменить пароль</b></div>
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
                <div class="profile-block-right">
                    <div class="profile-info">
                        <div class="profile-info-block">
                            <div class="profile-title"><b>Личные данные</b></div>
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

            </div>
            <div class="profile-bottom">
                <div class="profile-delete">
                    <div class="profile-delete-block">
                        <div class="profile-title"><b>Удаление аккаунта</b></div>
                        <div>Внимание! При удалении аккаунта Вы больше не сможете его восстановить. Все ваши посты и фотографии будут также удалены.</div>
                        <div class="profile-button">@include('profile.partials.delete-user-form')</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
<x-footer></x-footer>
