@extends('layouts.layout')
@section('content')
<div class="container">
  <div class="detail_container">
    <h2>スケジュール</h2>
    <h3>{{ $schedule->title }}</h3>
    <table class="table table-striped">
          <tr><td>完了　(1:完了)：</td><td>{{ $schedule->done }}</td></tr>
          <tr><td>日付：</td><td>{{ $schedule->start_date }}</td></tr>
          <tr><td>タイトル：</td><td>{{ $schedule->title }}</td></tr>
          <tr><td>メモ：</td><td>{{ $schedule->memo }}</td></tr>
          <tr><td>ファイル：</td><td>{{ $schedule->file }}</td></tr>
    </table>
          <a class="float-left" href="{{ route('calendar.index') }}">戻る</a>
          <a href="{{ route('calendar.edit',['id' => $schedule->id]) }}">
            <button type="button" name="button" class="btn btn-primary float-right">編集する</button>
          </a>
          {{ Form::open(['method' => 'delete', 'route' => ['calendar.destroy' , $schedule->id]]) }}
          {{ Form::submit('この内容を削除する', ['class' => 'btn btn-danger float-right mr-2']) }}
          {{ Form::close() }}
    </div>

@endsection
