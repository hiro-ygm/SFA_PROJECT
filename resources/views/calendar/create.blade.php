@extends('layouts.layout')
@section('content')

<div class="container">
  <div class="detail_container">
        <h2>新規作成</h2>
        {{ Form::open([ 'method'=>'POST','route' => 'calendar.store']) }}
          <div class="form-group">
            {{ Form::label('start_date', '日付：') }}
            @if($errors->has('start_date'))
            <p class="err_msg">エラー:{{ $errors->first('start_date') }}</p>
            @endif
            {{ Form::datetime('start_date', \Carbon\Carbon::now()->format('Y-m-d H:i:s'),['class' => 'form-control']) }}
          </div>
          <div class="form-group">
            {{ Form::label('title', 'タイトル：') }}
            @if($errors->has('title'))
            <p class="err_msg">エラー:{{ $errors->first('title') }}</p>
            @endif
            {{ Form::text('title',null, ['class' => 'form-control', 'placeholder' => '○○の件']) }}
          </div>
          <div class="form-group">
            {{ Form::label('memo', 'メモ：') }}
            @if($errors->has('memo'))
            <p class="err_msg">エラー:{{ $errors->first('memo') }}</p>
            @endif
            {{ Form::textarea('memo',null, ['class' => 'form-control', 'placeholder' => 'memo', 'rows' => 5]) }}
          </div>
          <div class="form-group">
            {{ Form::label('file', 'ファイル：') }}
            @if($errors->has('file'))
            <p class="err_msg">エラー:{{ $errors->first('file') }}</p>
            @endif
            {{ Form::file('file',null, ['class' => 'form-control']) }}
          </div>
          <div class="form-group">
            {{ Form::submit('作成する', ['class' => 'btn btn-primary float-right mb-2']) }}
            <a class="float-left" href="{{ route('calendar.index') }}">戻る</a>
          </div>
        {{ Form::close() }}
  </div>
</div>
@endsection
