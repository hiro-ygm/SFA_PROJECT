@extends('layouts.layout')
@section('title','顧客管理詳細')
@section('content')
<div class="container">
  <div class="detail_container">
    <h2>顧客管理メニュー</h2>
    <h3>{{ $customer->customer_name.'様' }}</h3>
    <img src={{ asset("storage/". $customer->image_url) }}>
  <table class="table table-striped">
      <tr><td>個人名：</td><td>{{ $customer->customer_name }}</td></tr>
      <tr><td>メールアドレス：</td><td>{{ $customer->email }}</td></tr>
      <tr><td>携帯電話番号：</td><td>{{ $customer->mobile_telno }}</td></tr>
      <tr><td>会社名：</td><td>{{ $customer->company_name }}</td></tr>
      <tr><td>部署名：</td><td>{{ $customer->department }}</td></tr>
  </table>
      <a class="float-left" href="{{ route('customer.index') }}">戻る</a>
      <a href="{{ route('customer.edit',['id' => $customer->id]) }}">
        <button type="button" name="button" class="btn btn-primary float-right">編集する</button>
      </a>
        {{ Form::open(['method' => 'delete', 'route' => ['customer.destroy' , $customer->id]]) }}
        {{ Form::submit('この顧客を削除する', ['class' => 'btn btn-danger float-right mr-2']) }}
        {{ Form::close() }}
  </div>
@endsection
