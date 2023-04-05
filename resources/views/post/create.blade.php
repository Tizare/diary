@extends('layouts.main')
@section('content')
    правка поста-та-та-та!
{{--    @dd($user->theme)--}}
    <x-errors></x-errors>
    <form method='post' action="{{ route('posts.store', ['diary' => $user]) }}" enctype="multipart/form-data">
        @csrf
{{--        @method('put')--}}
        {{--      <div class="form-group">--}}
        {{--          <label for="category_id">Категория</label>--}}
        {{--          <select id="category_id" name="category_id" class="form-control">--}}
        {{--              <option value="0">--Выбрать--</option>--}}
        {{--              @foreach($categoryList as $category)--}}
        {{--                  <option value="{{ $category->id }}" @if(in_array($category->id,--}}
        {{--                        $news->categories->pluck('id')->toArray())) selected @endif >{{ $category->title }}</option>--}}
        {{--              @endforeach--}}
        {{--          </select>--}}
        {{--      </div>--}}
        {{--      <div class="form-group">--}}
        {{--          <label for="title">Заголовок</label>--}}
        {{--          <input type="text" id="title" name="title" class="form-control" value="{{ $post->title }}">--}}
        {{--      </div>--}}
        {{--      <div class="form-group">--}}
        {{--          <label for="description">Описание</label>--}}
        {{--          <textarea id="description" name="description" class="form-control">{!! $post->description !!} </textarea>--}}
        {{--      </div>--}}

        <div class="form-group">
            <label for="text">Новость</label>
            <textarea id="text" name="text" class="form-control @error('text') is-invalid @enderror"> {{ old('text') }} </textarea>
        </div>
        @error('text')@enderror
        <div class="form-group">
            <label for="kg">Килограмм</label>
            <input id="kg" name="kg" class="form-control">{{ old('kg') }} </input>
        </div>
        <div class="form-group">
            <label for="gr">Грамм</label>
            <input id="gr" name="gr" class="form-control">{{ old('gr') }} </input>
        </div>
        <div class="form-group">
            <label for="theme">Статус</label>
            <select id="theme" name="theme" class="form-control ">
                @foreach($themes as $theme)
                    <option @if(old('theme') === $theme) selected
                            @elseif($user->theme === $theme) selected
                            @endif value="{{ $theme }}">{{ $theme }}</option>
                @endforeach
            </select>
        </div>

        <br>
        <button type="submit" class="post-button">Сохранить</button>
    </form>

@endsection
{{--@push('js')--}}
{{--    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>--}}
{{--    <script>--}}
{{--        var options = {--}}
{{--            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',--}}
{{--            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',--}}
{{--            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',--}}
{{--            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='--}}
{{--        };--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        CKEDITOR.replace('text', options);--}}
{{--    </script>--}}
{{--@endpush--}}

