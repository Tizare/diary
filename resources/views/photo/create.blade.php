@extends('layouts.main')
@section('content')
    {{--    @dd($user->theme)--}}
    <x-errors></x-errors>
    <form method='post' action="{{ route('photos.store', ['diary' => Auth::user()->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-block">
            <div class="form-block-input form-block-radio border-line">
                <div class="form-radio">
                    <label class="form-label form-radio-label" for="vertical">Фото&nbspвертикальное</label>
                    <input class ="form-input form-radio-input " name="position" id="vertical" type="radio" value="1" checked>
                </div>
                <div>
                    <label class="form-label form-radio-label" for="horizontal">Фото&nbspгоризонтальное</label>
                    <input class ="form-input " name="position" id="horizontal" type="radio" value="0">
                </div>
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
                <label class="form-image" for="image">Изображение</label>
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
@endsection
