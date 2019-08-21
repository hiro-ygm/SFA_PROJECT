@extends('layouts.layout')
@section('title','チャット一覧')
@section('content')

<div class="container">
<!-- チャットルーム一覧 -->
  <h1 class="page_title">チャットルーム／コンタクト一覧</h1>
    <!-- 検索バー
    {{ Form::open(['method' => 'get']) }}
    {{ csrf_field() }}
    <div class="search_bar mb-2">
      {{ Form::text('keyword', null, ['class' => 'form-control w-50 float-left']) }}
      {{ Form::submit('検索', ['class' => 'btn btn-outline-primary float-left ml-1']) }}
      <a href={{ route('chat.index') }} class="serch_clear">クリア</a>
      <div class="clear"></div>
    </div>
    {{ Form::close() }} -->
  <div class="chatroom  w-50 float-left pr-2">
    <h2 style="font-size:19px;">チャットルーム</h2>
    <table class="table table-striped">
      @for($i=0;$i < count($res_array); $i++)
      <tr>
        <td>
          <a class="chatMessage" data-room_id="{{ $res_array[$i]['room_id'] }}" href={{ action('ChatController@show', [ 'room_id' => $res_array[$i]['room_id'] ]) }} >
            {{ $res_array[$i]['name'] }}
          </a>
        </td>
        @endfor
      </table>
  </div>
<!-- コンタクト一覧 -->
  <div class="contact w-50 float-right">
    <h2 style="font-size:19px;">コンタクト</h2>
    <table class="table table-striped">
      @for($i=0;$i < count($contacts); $i++)
      <tr>
        <td>
          <a href={{ action('ChatController@show', [ 'room_id' => $contacts[$i]['room_id'] ]) }} >
            <img src="{{ $contacts[$i]['avatar_image_url']}}" >
            {{ $contacts[$i]['name'] }}
          </a>
        </td>
      </tr>
      @endfor
    </table>
  </div>
</div>
@endsection
