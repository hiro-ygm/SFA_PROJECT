@extends('layouts.layout')
@section('title','営業プロセス管理新規作成')
@section('content')

<div class="container">
  <div class="detail_container">
        <h2>新規作成</h2>
        {{ Form::open([ 'method'=>'POST','route' => 'process.store']) }}
          <div class="form-group">
            {{ Form::label('done', '完了：') }}
            @if($errors->has('done'))
            <p class="err_msg">エラー:{{ $errors->first('done') }}</p>
            @endif
            {{ Form::checkbox('done',1,null,['class' => 'field']) }}
          </div>
          <div class="form-group">
            {{ Form::label('contact_date', 'コンタクト日：') }}
            @if($errors->has('contact_date'))
            <p class="err_msg">エラー:{{ $errors->first('contact_date') }}</p>
            @endif
            {{ Form::date('contact_date', \Carbon\Carbon::now()->format('Y-m-d') ,['class' => 'form-control']) }}
          </div>
          <div class="form-group">
            {{ Form::label('company_id', '会社名：') }}
            @if($errors->has('company_id'))
            <p class="err_msg">エラー:{{ $errors->first('company_id') }}</p>
            @endif
            {{ Form::select('company_id',$companies, null,['class' => 'form-control', 'placeholder' => '--選択してください--']) }}
          </div>
          <div class="form-group">
            {{ Form::label('customer_id', '面談者名：') }}
            @if($errors->has('customer_id'))
            <p class="err_msg">エラー:{{ $errors->first('customer_id') }}</p>
            @endif
            {{ Form::select('customer_id',$customers, null,['class' => 'form-control', 'placeholder' => '--選択してください--']) }}様
          </div>
          <div class="form-group">
            {{ Form::label('purpose', '目的：') }}
            @if($errors->has('purpose'))
            <p class="err_msg">エラー:{{ $errors->first('purpose') }}</p>
            @endif
            {{ Form::select('purpose',['ヒアリング' => 'ヒアリング','見積提示' => '見積提示','クロージング' => 'クロージング', '成約' => '成約'],null,['class' => 'form-control', 'placeholder' => '--選択してください--']) }}
          </div>
          <div class="form-group">
            {{ Form::label('product_id', '商品名：') }}
            @if($errors->has('product_id'))
            <p class="err_msg">エラー:{{ $errors->first('product_id') }}</p>
            @endif
            {{ Form::select('product_id',$products, null,['class' => 'form-control', 'placeholder' => '--選択してください--']) }}様
          </div>
          <div class="form-group">
            {{ Form::label('progress_rate', '進捗率：') }}
            @if($errors->has('progress_rate'))
            <p class="err_msg">エラー:{{ $errors->first('progress_rate') }}</p>
            @endif
            {{ Form::select('progress_rate',[10,20,30,40,50,60,70,80,90],null, ['class' => 'form-control w-50']) }}％
          </div>
          <div class="form-group">
            {{ Form::label('memo', 'メモ：') }}
            @if($errors->has('memo'))
            <p class="err_msg">エラー:{{ $errors->first('memo') }}</p>
            @endif
            {{ Form::textarea('memo',null, ['class' => 'form-control', 'placeholder' => 'memo', 'rows' => 5]) }}
          </div>
          <div class="form-group">
            {{ Form::submit('作成する', ['class' => 'btn btn-primary float-right mb-2']) }}
            <a class="float-left" href="{{ route('process.index') }}">戻る</a>
          </div>
        {{ Form::close() }}
  </div>
</div>
@endsection
