@extends('layouts.layout')
@section('title','営業プロセス管理詳細')
@section('content')
<div class="container">
  <div class="detail_container">
    <h2>営業プロセス管理</h2>
    <table class="table table-striped">
          <tr><td>完了　(1:完了)：</td><td>{{ $process->done }}</td></tr>
          <tr><td>コンタクト日：</td><td>{{ $process->contact_date }}</td></tr>
          <tr><td>会社名：</td><td>{{ $process->customer->company_name }}</td></tr>
          <tr><td>面談者名：</td><td>{{ $process->customer->customer_name }} 様</td></tr>
          <tr><td>目的：</td><td>{{ $process->purpose }}</td></tr>
          <tr><td>メモ：</td><td>{{ $process->memo }}</td></tr>
    </table>
          <a class="float-left" href="{{ route('process.index') }}">戻る</a>
          <a href="{{ route('process.edit',['id' => $process->id]) }}">
            <button type="button" name="button" class="btn btn-primary float-right">編集する</button>
          </a>
          {{ Form::open(['method' => 'delete', 'route' => ['process.destroy' , $process->id]]) }}
          {{ Form::submit('この内容を削除する', ['class' => 'btn btn-danger float-right mr-2']) }}
          {{ Form::close() }}
    </div>

@endsection
