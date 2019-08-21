@extends('layouts.layout')
@section('title','顧客管理詳細')
@section('content')

<div class="edit container">
  <div class="detail_container">
    <h2>顧客管理メニュー</h2>
    <h3>編集画面</h3>
    {{ Form::open(['route' => ['customer.update', $customer->id], 'files'=> true]) }}
    <div class="form-group">
      {{ Form::label('customer_name', '個人名：') }}
      @if($errors->has('customer_name'))
      <p class="err_msg">エラー:{{ $errors->first('customer_name') }}</p>
      @endif
      {{ Form::text('customer_name',$customer->customer_name,['class' => 'form-control'] )}}
    </div>
    <div class="form-group">
      {{ Form::label('email', 'メールアドレス：') }}
      @if($errors->has('email'))
      <p class="err_msg">エラー:{{ $errors->first('email') }}</p>
      @endif
      {{ Form::text('email',$customer->email,['class' => 'form-control'])}}
    </div>
    <div class="form-group">
      {{ Form::label('mobile_telno', '携帯電話番号：') }}
       @if($errors->has('mobile_telno'))
        <p class="err_msg">エラー:{{ $errors->first('mobile_telno') }}</p>
        @endif
      {{ Form::text('mobile_telno',$customer->mobile_telno,['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('company_name', '会社名：') }}
      @if($errors->has('company_name'))
      <p class="err_msg">エラー:{{ $errors->first('company_name') }}</p>
      @endif
      {{ Form::text('company_name',$customer->company_name,['class' => 'form-control'])}}
    </div>
    <div class="form-group">
      {{ Form::label('department', '部署名：') }}
      @if($errors->has('department'))
      <p class="err_msg">エラー:{{ $errors->first('department') }}</p>
      @endif
      {{ Form::text('department',$customer->department,['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('rankt', 'ランク：') }}
      @if($errors->has('rank'))
      <p class="err_msg">エラー:{{ $errors->first('rank') }}</p>
      @endif
      {{ Form::text('rank',$customer->rank,['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('industory_id', '業界：') }}
      @if($errors->has('industory_id'))
      <p class="err_msg">エラー:{{ $errors->first('industory_id') }}</p>
      @endif
      {{ Form::select('industory_id', $industories,$customer->industory_name,['class' => 'custom-select']) }}
    </div>
    <div class="form-group">
      <img src="{{ asset("storage/". $customer->image_url) }}">
      {{ Form::label('image_url', 'アイコン(jpeg,png)：画像をアップロード:', ['class' => 'control-label']) }}
      @if($errors->has('image_url'))
      <p class="err_msg">エラー:{{ $errors->first('image_url') }}</p>
      @endif
      {{ Form::file('image_url') }}
    </div>
    <div class="form-group">
      {{ Form::submit('更新する', ['class' => 'btn btn-primary float-right mb-2']) }}
      <a class="float-left" href="{{ route('customer.index') }}">戻る</a>
    </div>
    {{ Form::close() }}
  </div>
  <div class="form-group">
    {{ Form::open(['method' => 'delete', 'route' => ['customer.destroy' , $customer->id]]) }}
    {{ Form::submit('この顧客を削除する', ['class' => 'btn btn-danger float-right mr-2']) }}
    {{ Form::close() }}
  </div>
@endsection
