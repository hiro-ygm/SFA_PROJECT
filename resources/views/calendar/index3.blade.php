@extends('layouts.layout')
@section('title','営業プロセス管理')
@section('content')

<div class="container">
  <div class="calendar float-left w-25">
    <h2 class="contents_title">スケジュール</h2>
    <table class="table calendarTable table-bordered">
      <thead>
        <tr>
          <th colspan="2"><a href="/calendar/index/{{ \Carbon\Carbon::today()->copy()->subMonths(1)->format('Y/m') }}">前月</a></th>
          <!-- <th colspan="3"><a href="#">{{ $dates[10]->format('Y年') }}</a></th>
          <th colspan="2"><a href="#">{{ $dates[10]->format('m月') }}</a></th> -->
          <th colspan="3">{{ $dates[10]->format('Y年m月') }}</th>
          <th colspan="2"><a href="/calendar/index/{{ \Carbon\Carbon::today()->copy()->addMonths(1)->format('Y/m')}}">次月</a></th>
        </th>
        </tr>
        <tr>
          @foreach (['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
          <th>{{ $dayOfWeek }}</th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach ($dates as $date)
        @if ($date->dayOfWeek == 0)
        <tr>
          @endif
          <td  @if($date == \Carbon\Carbon::today()) class="today text-center" @endif class="text-center" >
            {{ $date->day }}
        </td>
        @if ($date->dayOfWeek == 6)
        </tr>
        @endif
        @endforeach
        <th colspan="7"><a href="/calendar/index/{{ \Carbon\Carbon::today()->format('Y/m') }}">今月</a></th>
      </tbody>
    </table>
  </div>
<!-- イベント表示部分 -->
  <div class="event_container float-right w-75 pl-5">
    <h2 class="contents_title">イベント</h1>
      {{ Form::open(['method' => 'get']) }}
        {{ csrf_field() }}
        <div class="search_bar mb-2">
          {{ Form::text('keyword', null, ['class' => 'form-control w-50 float-left']) }}
          {{ Form::submit('検索', ['class' => 'btn btn-outline-primary float-left ml-1']) }}
          <a href={{ route('calendar.index') }} class="serch_clear">クリア</a>
          <div class="btn-group ml-3 float-right" role="group" aria-label="Basic example">
            {{ Form::submit('未完', ['class' => 'btn btn-primary', 'name' => 'schedule_phase_doing']) }}
            {{ Form::submit('完了', ['class' => 'btn btn-primary', 'name' => 'schedule_phase_finished']) }}
          {{ Form::close() }}
          </div>
          <a href={{ route('calendar.index') }} class="serch_clear float-right"><button type="button" class="btn btn-primary">全て</button></a>
          <div class="clear"></div>
        </div>
      {{ Form::close() }}
      <a href="{{ route('calendar.create') }}"><button type="button" class="btn btn-success mb-1">新規作成</button></a>
      <table class="table eventTable table-striped">
        <thead>
          <tr>
            <th>日付</th>
            <th>タイトル</th>
            <th>メモ</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($schedules as $schedule)
          <tr>
            <td><a href="{{ route('calendar.show',['id' => $schedule->id]) }}">{{ $schedule->start_date }}</a></td>
            <td><a href="{{ route('calendar.show',['id' => $schedule->id]) }}">{{ $schedule->title }}</a></td>
            <td><a href="{{ route('calendar.show',['id' => $schedule->id]) }}">{{ $schedule->memo }}</a></td>
            <td>
                <a class="ml-1" href="{{ route('calendar.show',['id' => $schedule->id ]) }}">
                  <button type="button" name="button" class="btn btn-outline-dark">
                    詳細
                  </button>
                </a>
                <a class="ml-1" href="{{ route('calendar.edit',['id' => $schedule->id ]) }}">
                  <button type="button" name="button" class="btn btn-outline-dark">
                    編集
                  </button>
                </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>

</div>

<!-- Modal -->
<!-- 新規スケジュール作成 -->
<!-- <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">スケジュール</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ Form::open([ 'method'=>'POST','route' => 'calendar.store']) }}
          <div class="form-group">
            {{ Form::label('start_date', '日付：') }}
            {{ Form::input('datetime','start_date', '2019-07-10 00:00:00', ['class' => 'form-control']) }}
          </div>
          <div class="form-group">
            {{ Form::label('title', 'タイトル：') }}
            {{ Form::text('title','○○の件', ['class' => 'form-control']) }}
          </div>
          <div class="form-group">
            {{ Form::label('memo', 'メモ：') }}
            {{ Form::textarea('memo','memo', ['class' => 'form-control']) }}
          </div>
          <div class="form-group">
            {{ Form::label('file', 'ファイル：') }}
            {{ Form::file('file',null, ['class' => 'form-control']) }}
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div> -->
@endsection
