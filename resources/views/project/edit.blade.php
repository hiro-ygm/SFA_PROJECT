@extends('layouts.layout')
@section('title','案件管理編集')
@section('content')
<div class="container">
  <div class="detail_container">
    <h2>編集画面</h2>
    {{ Form::open(['route' => ['project.update', $project->id]]) }}
    <div class="form-group">
      {{ Form::label('project_name', '案件名：') }}
      @if($errors->has('project_name'))
      <p class="err_msg">エラー:{{ $errors->first('project_name') }}</p>
      @endif
      {{ Form::text('project_name',$project->project_name,['class' => 'form-control'])}}
    </div>
    <div class="form-group">
      {{ Form::label('start_date', '案件発生日：') }}
      @if($errors->has('start_date'))
      <p class="err_msg">エラー:{{ $errors->first('start_date') }}</p>
      @endif
      {{ Form::date('start_date', $project->start_date,['class' => 'form-control']) }}
    </div>
    <!-- <div class="form-group">
      {{ Form::label('company_name', '顧客会社名：') }}
      @if($errors->has('company_name'))
      <p class="err_msg">エラー:{{ $errors->first('company_name') }}</p>
      @endif
      {{ Form::text('company_name',null,['class' => 'form-control', 'placeholder' => '例）株式会社　楽々'])}}
    </div> -->
    <div class="form-group">
      {{ Form::label('customer_id', '顧客担当者名：') }}
      @if($errors->has('customer_id'))
      <p class="err_msg">エラー:{{ $errors->first('customer_id') }}</p>
      @endif
      {{ Form::select('customer_id', $customers, $project->customer->customer_name, ['class' => 'custom-select'])}}
    </div>
    <div class="form-group">
      {{ Form::label('industory_id', '業界：') }}
      @if($errors->has('industory_id'))
      <p class="err_msg">エラー:{{ $errors->first('industory_id') }}</p>
      @endif
      {{ Form::select('industory_id', $industories,$project->industory_name,['class' => 'custom-select']) }}
    </div>
    <div class="form-group">
      {{ Form::label('sales_amount', '売上見込み金額(円)') }}
       @if($errors->has('sales_amount'))
        <p class="err_msg">エラー:{{ $errors->first('sales_amount') }}</p>
        @endif
      {{ Form::number('sales_amount',$project->sales_amount,['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('product_id', '商品名：') }}
      @if($errors->has('product_id'))
      <p class="err_msg">エラー:{{ $errors->first('product_id') }}</p>
      @endif
      {{ Form::select('product_id',$products,$project->product_name,['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('sintyokuritu', '進捗率(％)：') }}
      @if($errors->has('sintyokuritu'))
      <p class="err_msg">エラー:{{ $errors->first('sintyokuritu') }}</p>
      @endif
      {{ Form::number('sintyokuritu',$project->sintyokuritu,['class' => 'custom-select']) }}
    </div>
    <div class="form-group">
      {{ Form::label('close_date', 'クローズ日：') }}
      @if($errors->has('close_date'))
      <p class="err_msg">エラー:{{ $errors->first('close_date') }}</p>
      @endif
      {{ Form::date('close_date',$project->close_date,['class' => 'form-control'])}}
    </div>
    <div class="form-group">
      {{ Form::label('sales_date', '売上日：') }}
      @if($errors->has('sales_date'))
      <p class="err_msg">エラー:{{ $errors->first('sales_date') }}</p>
      @endif
      {{ Form::date('sales_date',$project->sales_date,['class' => 'form-control'])}}
    </div>
    <div class="form-group">
      {{ Form::submit('更新する', ['class' => 'btn btn-primary float-right mb-2']) }}
      <a class="float-left" href="{{ route('project.index') }}">戻る</a>
    </div>
    {{ Form::close() }}
  </div>
@endsection
