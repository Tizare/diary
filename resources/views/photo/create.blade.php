@extends('layouts.main')
@section('content')
    {{--    @dd($user->theme)--}}
    <x-errors></x-errors>
    <form method='post' action="{{ route('photos.store', ['diary' => Auth::user()->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-block">
            <div class="form-block-input border-line">
                <label class="form-label" for="vertical">Фото&nbspвертикальное</label>
                <input class ="form-input input-full" name="position" id="vertical" type="radio" value="1" checked>
                <label class="form-label" for="horizontal">Фото&nbspгоризонтальное</label>
                <input class ="form-input input-full" name="position" id="horizontal" type="radio" value="0">
            </div>

            <div class="form-block-input border-line">
                <label class="form-label" for="title">Краткая&nbspзаметка:</label>
                <input class ="form-input input-full" name="title" id="title" type="text" value="{{ old('title') }}">
            </div>

            <div class="form-block-input">
                <label class="form-label" for="desc">Подробное&nbspописание:</label>
                <textarea class ="form-input" name="desc" id="desc" type="desc" rows="5"> {!! old('desc') !!}</textarea>
            </div>

            <div class="form-block-input">
                <label for="image">Изображение</label>
                <input type="file" id="image" name="image" class="form-input" >
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
{{--    <script>--}}
{{--        CKEDITOR.replace('text', options);--}}
{{--    </script>--}}
{{--    <link href="{{ asset('assets\css\editor.css') }}" rel="stylesheet">--}}
@endsection
