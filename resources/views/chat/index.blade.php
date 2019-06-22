@extends('layouts.layout')
@section('content')


<div class="container">
  <!-- サイドバー -->
  <div class="side_bar">
      <h1 class="page_title">チャットルーム</h1>

          {{ Form::open(['method' => 'get']) }}
          {{ csrf_field() }}
          <div class="search_bar mb-2">
            {{ Form::text('keyword', null, ['class' => 'form-control w-50 float-left']) }}
            {{ Form::submit('検索', ['class' => 'btn btn-outline-primary float-left ml-1']) }}
            <a href={{ route('chat.index') }} class="serch_clear">クリア</a>
            <div class="clear"></div>
          </div>
          {{ Form::close() }}

      <table class="table">
      @for($i=0;$i < count($res_array); $i++)
      <tr>
        <td>
          <a class="chatMessage" data-room_id="{{ $res_array[$i]['room_id'] }}" href={{ action('ChatController@show', [ 'room_id' => $res_array[$i]['room_id'] ]) }} >
            {{ $res_array[$i]['name'] }}
          </a>
        </td>
        @endfor
      </table>



   <h6>コンタクト</h6>
      <table class="table">
        @for($i=0;$i < count($contacts); $i++)
        <tr>
          <td>
            <a href={{ action('ChatController@show', [ 'room_id' => $contacts[$i]['room_id'] ]) }} >
            <!-- <a href="{{ 'https://www.chatwork.com/#!rid' . $contacts[$i]['room_id'] }}" target="_blank"> -->
              <img src="{{ $contacts[$i]['avatar_image_url']}}" >
              {{ $contacts[$i]['name'] }}
            </a>
          </td>
        </tr>
        @endfor
      </table>
  </div>

  <!-- メインスペース -->


    <!-- Modal -->
    <div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModal3Label">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">

            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Send</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

</div>
@endsection
