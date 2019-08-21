@extends('layouts.layout')
@section('title','チャットルーム')
@section('content')
<div class="container">
  <a class="float-right" href="{{ route('chat.index') }}">チャットルーム一覧に戻る</a>
<!-- 検索バー -->
  <div class="info container">
    <div class="search_bar mb-2">
      {{ Form::open(['method' => 'get']) }}
        {{ csrf_field() }}
        {{ Form::text('keyword', null, ['class' => 'form-control w-50 float-left']) }}
        {{ Form::submit('検索', ['class' => 'btn btn-outline-primary float-left ml-1']) }}
      {{ Form::close() }}
      <div class="clear"></div>
    </div>
    <!-- メッセージ作成部分 -->
      <div class="create_chat_bar mb-2" style="background-color: rgba(255,255,255,0.5);">
        {{ Form::open(['method' => 'post', 'route' => 'chat.create' ]) }}
        {{ csrf_field() }}
        {{ Form::hidden('room_id', $room_id)}}
        {{ Form::textarea('chatTalk', null, ['class' => 'form-control', 'rows' => 4, 'placeholder' => 'チャットを作成']) }}
        {{ Form::submit('送信ボタン', ['class' => 'btn btn-block btn-info']) }}
        {{ Form::close() }}
        <div class="clear"></div>
      </div>
  </div>
  <!-- チャット表示部分 -->
    <table class="table table-striped text-center">
    @for($i = count($chatMessage) - 1; $i >= 0; $i--)
      <tr class="row m-0">
        <td class="col-3">
          {{ date('Y-m-d H:s', $chatMessage[$i]['send_time']) }}
        </td>
        <td class="col-1">
          <img src="{{ $chatMessage[$i]['account']['avatar_image_url'] }}">
        </td>
        <td class="col-2">
          {{ $chatMessage[$i]['account']['name'] }}
        </td>
        <td class="col-5 text-left">
          {{ $chatMessage[$i]['body'] }}
        </td>
        <td  class="col-1">
          @if($chatMessage[$i]['account']['account_id'] == $chat_account_id)
            {{ Form::open(['method' => 'delete', 'route' => ['chatMessage.delete', $room_id] ]) }}
            {{ csrf_field() }}
            {{ Form::hidden('room_id', $room_id)}}
            {{ Form::hidden('message_id', $chatMessage[$i]['message_id'])}}
            {{ Form::submit('削除', ['class' => 'btn btn-outline-danger']) }}
            {{ Form::close() }}
          @endif
        </td>
      </tr>
    @endfor
    </table>
</div>
@endsection
