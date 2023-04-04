@extends('layouts.main')
@section('content')
  правка поста-та-та-та!
  <form method='post' action="{{ route('post.update', ['post'=> $post]) }}" enctype="multipart/form-data">
      @csrf
      @method('put')
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
          <textarea id="text" name="text" class="form-control"> {!! $post[0]->text !!} </textarea>
      </div>
      <div class="form-group">
          <label for="kg">Килограмм</label>
          <textarea id="kg" name="kg" class="form-control">{!! $post[0]->kg !!} </textarea>
      </div>
      <div class="form-group">
          <label for="gr">Грамм</label>
          <textarea id="gr" name="gr" class="form-control">{!! $post[0]->gr !!} </textarea>
      </div>

      <br>
      <button type="submit" class="btn btn-success">Сохранить</button>
  </form>
    @dd($post)
@endsection
