@extends('layouts.main')
@section('content')
{{--    @dd($user->theme)--}}
    <x-errors></x-errors>
    <form method='post' action="{{ route('posts.store', ['diary' => $user]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-block">
{{--            <div class="form-block-input border-line">--}}
{{--                <label class="form-label" for="title">Заголовок:</label>--}}
{{--                <input class ="form-input input-full" name="title" id="title" type="text" value="{{ old('title') }}">--}}
{{--            </div>--}}
            <div class="form-block-input border-line">
                <label class="form-label" for="mood">Настроение:</label>
                <input class ="form-input input-full" name="mood" id="mood" type="text" value="{{ old('mood') }}">
            </div>
            <div class="form-block-input border-line">
                <label class="form-label" for="health">Самочувствие:</label>
                <input class ="form-input input-full" name="health" id="health" type="text" value="{{ old('health') }}">
            </div>
            <div class="form-block-group border-line">
                <div class="form-block-input">
                    <label class="form-label" for="year">Возраст&nbsp(полных&nbspлет):</label>
                    <input class ="form-input input-half" name="year" id="year" type="text" value="{{ old('year') }}">
                </div>
                <div class="form-block-input">
                    <label class="form-label" for="month">месяцев:</label>
                    <input class ="form-input input-half" name="month" id="month" type="text" value="{{ old('month') }}">
                </div>
            </div>
            <div class="form-block-group border-line">
                <div class="form-block-input">
                    <label class="form-label" for="kg">Вес&nbsp(кг):</label>
                    <input class ="form-input input-half" name="kg" id="kg" type="text" value="{{ old('kg') }}">
                </div>
                <div class="form-block-input">
                    <label class="form-label" for="gr">гр:</label>
                    <input class ="form-input input-half" name="gr" id="gr" type="text" value="{{ old('gr') }}">
                </div>
            </div>
            <div class="form-block-input border-line">
                <label class="form-label" for="ht">Рост&nbsp(см):</label>
                <input class ="form-input input-full" name="ht" id="ht" type="text" value="{{ old('ht') }}">
            </div>
            <div class="form-block-input border-line">
                <label class="form-label" for="theme">Тема:</label>
                <select id="theme" name="theme" class="form-input input-full ">
                    @foreach($themes as $theme)
                        <option @if(old('theme') === $theme) selected
                                @elseif($user->theme === $theme) selected
                                @endif value="{{ $theme }}">{{ $theme }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-block-input">
                <label class="form-label label-editor" for="text">Текст:</label>
                <textarea class ="form-input" name="text" id="text" type="text" rows="5"> {!! old('text') !!}</textarea>
            </div>
        </div>

        <br>
        <button type="submit" class="post-button">Сохранить</button>

    </form>
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
        CKEDITOR.replace('text', options);
    </script>
    <link href="{{ asset('assets\css\editor.css') }}" rel="stylesheet">
@endsection


