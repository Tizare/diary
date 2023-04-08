@extends('layouts.main')
@section('content')

  <form method='post' action="{{ route('posts.update', ['post'=> $post]) }}" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="form-block">
          <div class="form-block-input border-line">
              <label class="form-label" for="title">Заголовок:</label>
              <input class ="form-input input-full" name="title" id="title" type="text" value="{{ $post->title }}">
          </div>
          <div class="form-block-input border-line">
              <label class="form-label" for="mood">Настроение:</label>
              <input class ="form-input input-full" name="mood" id="mood" type="text" value="{{ $post->mood }}">
          </div>
          <div class="form-block-input border-line">
              <label class="form-label" for="health">Самочувствие:</label>
              <input class ="form-input input-full" name="health" id="health" type="text" value="{{ $post->health }}">
          </div>
          <div class="form-block-group border-line">
              <div class="form-block-input">
                  <label class="form-label" for="year">Возраст&nbsp(полных&nbspлет):</label>
                  <input class ="form-input input-half" name="year" id="year" type="text" value="{{ $post->year }}">
              </div>
              <div class="form-block-input">
                  <label class="form-label" for="month">месяцев:</label>
                  <input class ="form-input input-half" name="month" id="month" type="text" value="{{ $post->month }}">
              </div>
          </div>
          <div class="form-block-group border-line">
              <div class="form-block-input">
                  <label class="form-label" for="kg">Вес&nbsp(кг):</label>
                  <input class ="form-input input-half" name="kg" id="kg" type="text" value="{{ $post->kg }}">
              </div>
              <div class="form-block-input">
                  <label class="form-label" for="gr">гр:</label>
                  <input class ="form-input input-half" name="gr" id="gr" type="text" value="{{ $post->gr }}">
              </div>
          </div>
          <div class="form-block-input border-line">
              <label class="form-label" for="ht">Рост&nbsp(см):</label>
              <input class ="form-input input-full" name="ht" id="ht" type="text" value="{{ $post->ht }}">
          </div>
          <div class="form-block-input border-line">
              <label class="form-label" for="theme">Тема:</label>
              <select id="theme" name="theme" class="form-input input-full ">
                  @foreach($themes as $theme)
                      <option @if(old('theme') === $theme) selected
                              @elseif($post->theme === $theme) selected
                              @endif value="{{ $theme }}">{{ $theme }}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-block-input">
              <label class="form-label" for="text">Текст:</label>
              <textarea class ="form-input" name="text" id="text" type="text" rows="5"> {!! $post->text !!}</textarea>
          </div>
      </div>
      <button type="submit" class="post-button">Сохранить</button>
  </form>


@endsection
