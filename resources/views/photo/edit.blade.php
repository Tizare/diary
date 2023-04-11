@extends('layouts.main')
@section('content')
    <x-errors></x-errors>
    <form method='post' action="{{ route('photos.update', ['photo' => $photo]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-block">
            <div class="form-block-input form-block-radio border-line">
                <div class="form-radio">
                    <label class="form-label form-radio-label" for="vertical">Фото&nbspвертикальное</label>
                    <input class ="form-input form-radio-input " name="position" id="vertical" type="radio" value="1"
                           @if($photo->position) checked @endif>
                </div>
                <div>
                    <label class="form-label form-radio-label" for="horizontal">Фото&nbspгоризонтальное</label>
                    <input class ="form-input " name="position" id="horizontal" type="radio" value="0"
                           @if(!$photo->position) checked @endif>
                </div>
            </div>

            <div class="form-block-input border-line">
                <label class="form-label" for="title">Краткая&nbspзаметка:</label>
                <input class ="form-input input-full" name="title" id="title" type="text" value="{{ $photo->title }}">
            </div>

            <div class="form-block-input">
                <label class="form-label" for="desc">Подробное&nbspописание:</label>
                <textarea class ="form-input" name="desc" id="desc" type="desc" rows="5"> {!! $photo->desc !!}</textarea>
            </div>

            <div class="form-block-photo-show">
                <img src="{{ Storage::disk('public')->url($photo->url) }}">
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

@endsection
