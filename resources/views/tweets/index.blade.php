@extends('layout')

@section('content')
<div class="contents row">
  @foreach($tweets as $tweet)
    <div class="content_post" style="background-image: url({{$tweet->image}});">
      <div class="more">
        <span><img src="/images/arrow_top.png"></span>
        <ul class="more_list">
          <li><a href="/tweets/{{$tweet->id}}">詳細</a></li>
          @if (Auth::check() && Auth::user()->id == $tweet->user_id)
            <li><a href="/tweets/{{$tweet->id}}/edit">編集</a></li>
            <li><a href="/tweets/{{$tweet->id}}/delete">削除</a></li>
          @endif
        </ul>
      </div>

      <p>{{ $tweet->text }}</p>
      <span class="name">
        <a href="/users/{{ $tweet->user_id }}"><span>投稿者</span>{{ $tweet->user->name }}</a>
      </span>
    </div>
  @endforeach
  {{ $tweets->render() }}
</div>
@endsections
