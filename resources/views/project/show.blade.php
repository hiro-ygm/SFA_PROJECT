@extends('layouts.layout')
@section('title','案件管理詳細')
@section('content')
<div class="container">
  <div class="detail_container">
    <h2>{{ $project->project_name }}</h2>
  <table class="table table-striped">
        <tr><td>案件発生日：</td><td>{{ $project->start_date }}</td></tr>
        <tr><td>プロジェクト名：</td><td>{{ $project->project_name }}</td></tr>
        <tr><td>顧客会社名：</td><td>{{ $project->customer->company_name }}</td></tr>
        <tr><td>顧客担当者名：</td><td>{{ $project->customer->customer_name }}</td></tr>
        <tr><td>業界：</td><td>{{ $project->industory->industory_name }}</td></tr>
        <tr><td>売上見込み金額(円)：</td><td>{{ number_format($project->sales_amount) }}</td></tr>
        <tr><td>商品名：</td><td>{{ $project->product->product_name }}</td></tr>
        <tr><td>進捗率：</td><td>{{ $project->sintyokuritu . '%' }}</td></tr>
        <tr><td>クローズ日：</td><td>{{ $project->close_date }}</td></tr>
        <tr><td>売上日：</td><td>{{ $project->sales_date }}</td></tr>
  </table>
        <a class="float-left" href="{{ route('project.index') }}">戻る</a>
        <a href="{{ route('project.edit',['id' => $project->id]) }}">
          <button type="button" name="button" class="btn btn-primary float-right">編集する</button>
        </a>
        {{ Form::open(['method' => 'delete', 'route' => ['project.destroy' , $project->id]]) }}
        {{ Form::submit('この顧客を削除する', ['class' => 'btn btn-danger float-right mr-3']) }}
        {{ Form::close() }}
  </div>
@endsection
