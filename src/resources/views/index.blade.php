@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__alert">
  <div class="todo__alert--success">
    Todoを作成しました
  </div>
</div>

<div class="todo__content">
  <div class="section__title">
    <h2>新規作成</h2>
  </div>

  <form class="create-form" action="/todos" method="POST">
    @csrf
    <div class="create-form__item">
      <input class="create-form__item-input" type="text" name="content" value="{{ old('content') }}"/>
      <select class="create-form__item-select" name="category_id">
        <option value="">カテゴリ</option>
        @foreach ($categories as $category)
          <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
        @endforeach
      </select>
    </div>
    <div class="create-form__button">
      <button class="create-form__button-submit" type="submit">作成</button>
    </div>
  </form>

  <div class="section__title">
    <h2>Todo検索</h2>
  </div>
  <form class="search-form" action="/todos/search" method="get">
    @csrf
    <div class="search-form__item">
      <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword') }}">
      <select class="search-form__item-select" name="category_id">
        <option value="">カテゴリ</option>
        @foreach ($categories as $category)
          <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
        @endforeach
      </select>
    </div>
    <div class="search-form__button">
      <button class="search-form__button-submit" type="submit">検索</button>
    </div>
  </form>
  </div>
