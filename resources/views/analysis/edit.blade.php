@extends('layouts.layout')
@section('title','データ分析目標変更')
@section('content')

<div class="container">
  <div class="detail_container">
    <h2>目標設定</h2>
    <h3>{{ $goal->goal_date}}年度</h3>
    {{ Form::open(['route' => ['analysis.update', $goal->id]]) }}
    {{ Form::hidden('goal_date',$goal->goal_date) }}
      <div class="table table-striped">
          <div class="form-group">
            @if($errors->has('goal_contact'))
            <p class="err_msg">コンタクト数エラー:{{ $errors->first('goal_contact') }}</p>
            @endif
            {{ Form::label('goal_contact','コンタクト数：') }}
            {{ Form::input('number', 'goal_contact', $goal->goal_contact, ['class' => 'form-control']) }}
          </div>

          <div class="form-group">
            @if($errors->has('goal_mitsumori'))
            <p class="err_msg">見積提示数エラー:{{ $errors->first('goal_mitsumori') }}</p>
            @endif
            {{ Form::label('goal_mitsumori','見積提示数：')}}
            {{ Form::number('goal_mitsumori',$goal->goal_mitsumori,['class' => 'form-control']) }}
          </div>

          <div class="form-group">
            @if($errors->has('goal_anken'))
            <p class="err_msg">見積提示数エラー:{{ $errors->first('goal_anken') }}</p>
            @endif
            {{ Form::label('goal_anken','案件発生数：') }}
            {{ Form::number('goal_anken',$goal->goal_anken,['class' => 'form-control']) }}
          </div>
          <div class="form-group">
            @if($errors->has('goal_seiyaku'))
            <p class="err_msg">成約数エラー:{{ $errors->first('goal_seiyaku') }}</p>
            @endif
              {{ Form::label('goal_seiyaku', '成約数：') }}
              {{ Form::number('goal_seiyaku',$goal->goal_seiyaku,['class' => 'form-control']) }}
            </div>
          </div>
          {{ Form::submit('登録',['class' => 'btn btn-primary float-left mr-3 ']) }}
          {{ Form::close() }}
          <a href="{{ route('analysis.show') }}" class="float-right mr-3">戻る</a>

@endsection
</div>
