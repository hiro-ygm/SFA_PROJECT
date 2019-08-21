@extends('layouts.layout')
@section('title','顧客管理新規作成')
@section('content')

<div class="container">
  <div class="detail_container">
    <h2>顧客新規作成</h2>
    {{ Form::open(['route' => 'customer.store', 'files'=> true]) }}
    <div class="form-group">
      {{ Form::label('customer_name', '個人名：') }}
      @if($errors->has('customer_name'))
      <p class="err_msg">エラー:{{ $errors->first('customer_name') }}</p>
      @endif
      {{ Form::text('customer_name',null,['class' => 'form-control', 'placeholder' => '例）楽々　太郎'])}}
    </div>
    <div class="form-group">
      {{ Form::label('email', 'メールアドレス：') }}
      @if($errors->has('email'))
      <p class="err_msg">エラー:{{ $errors->first('email') }}</p>
      @endif
      {{ Form::text('email',null,['class' => 'form-control', 'placeholder' => '例）rakuraku@zmail.jp'])}}
    </div>
    <div class="form-group">
      {{ Form::label('mobile_telno', '携帯電話番号：') }}
       @if($errors->has('mobile_telno'))
        <p class="err_msg">エラー:{{ $errors->first('mobile_telno') }}</p>
        @endif
      {{ Form::text('mobile_telno',null,['class' => 'form-control', 'placeholder' => '例）090-1234-5678']) }}
    </div>
    <div class="form-group">
      {{ Form::label('company_name', '会社名：') }}
      @if($errors->has('company_name'))
      <p class="err_msg">エラー:{{ $errors->first('company_name') }}</p>
      @endif
      {{ Form::text('company_name',null,['class' => 'form-control', 'placeholder' => '例）株式会社　楽々'])}}
    </div>
    <div class="form-group">
      {{ Form::label('department', '部署名：') }}
      @if($errors->has('department'))
      <p class="err_msg">エラー:{{ $errors->first('department') }}</p>
      @endif
      {{ Form::text('department',null,['class' => 'form-control', 'placeholder' => '例）デザイン部']) }}
    </div>
    <div class="form-group">
      {{ Form::label('rankt', 'ランク：') }}
      @if($errors->has('rank'))
      <p class="err_msg">エラー:{{ $errors->first('rank') }}</p>
      @endif
      {{ Form::text('rank',null,['class' => 'form-control', 'placeholder' => '例）A']) }}
    </div>
    <div class="form-group">
      {{ Form::label('industory_id', '業界：') }}
      @if($errors->has('industory_id'))
      <p class="err_msg">エラー:{{ $errors->first('industory_id') }}</p>
      @endif
      {{ Form::select('industory_id', $industories,null,['class' => 'custom-select', 'placeholder' => '例）自動車']) }}
    </div>
    <div class="form-group">
      {{ Form::label('image_url', 'アイコン(jpeg,png)：画像をアップロード:', ['class' => 'control-label']) }}
      @if($errors->has('image_url'))
      <p class="err_msg">エラー:{{ $errors->first('image_url') }}</p>
      @endif
      {{ Form::file('image_url') }}
    </div>
    <div class="form-group">
      {{ Form::submit('作成する', ['class' => 'btn btn-primary float-right mb-2']) }}
      <a class="float-left" href="{{ route('customer.index') }}">戻る</a>
    </div>
    {{ Form::close() }}
  </div>
@endsection
