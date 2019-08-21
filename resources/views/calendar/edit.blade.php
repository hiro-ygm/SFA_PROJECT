@extends('layouts.layout')
@section('content')
<div class="container">
  <div class="detail_container">
        <h2>スケジュール</h2>
        <h3>編集画面</h3>
        {{ Form::open([ 'route' => ['calendar.update', $schedule->id]]) }}
          <div class="form-group">
            {{ Form::label('done', '完了：') }}
            {{ Form::checkbox('done','1',$schedule->done)}}
          </div>
          <div class="form-group">
            {{ Form::label('start_date', '日付：') }}
            @if($errors->has('start_date'))
            <p class="err_msg">エラー:{{ $errors->first('start_date') }}</p>
            @endif
            {{ Form::datetime('start_date', $schedule->start_date,['class' => 'form-control']) }}
          </div>
          <div class="form-group">
            {{ Form::label('title', 'タイトル：') }}
            @if($errors->has('title'))
            <p class="err_msg">エラー:{{ $errors->first('title') }}</p>
            @endif
            {{ Form::text('title',$schedule->title, ['class' => 'form-control']) }}
          </div>
          <div class="form-group">
            {{ Form::label('memo', 'メモ：') }}
            @if($errors->has('memo'))
            <p class="err_msg">エラー:{{ $errors->first('memo') }}</p>
            @endif
            {{ Form::textarea('memo',$schedule->memo, ['class' => 'form-control', 'rows' => 5]) }}
          </div>
          <div class="form-group">
            {{ Form::label('file', 'ファイル：') }}
            @if($errors->has('file'))
            <p class="err_msg">エラー:{{ $errors->first('file') }}</p>
            @endif
            {{ Form::file('file',$schedule->file, ['class' => 'form-control']) }}
          </div>
          <div class="form-group">
            {{ Form::submit('更新する', ['class' => 'btn btn-primary float-right mb-2']) }}
            <a class="float-left" href="{{ route('calendar.index') }}">戻る</a>
          </div>
        {{ Form::close() }}
  </div>
</div>
@endsection
