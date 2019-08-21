@extends('layouts.layout')
@section('title','データ分析目標設定')
@section('content')

<div class="container">
  <div class="detail_container">

    <h2 class="float-left mr-2">目標設定</h2>
    {{ Form::open(['method' => 'post', 'route' => 'analysis.store'])}}
      <div class="input-group" style="width:150px;">
        {{ Form::selectRange('goal_date',2015,2025,\Carbon\Carbon::now()->format('Y'),['class' => 'form-control', 'style' => 'width:100px;']) }}
        {{ Form::label('goal_date','年',['class' => 'input-group-text']) }}
      </div>
      <div class="clear"></div>
      <div class="err_msg">
        @if($errors->has('goal_date'))
        <p class="err_msg">年数エラー:{{ $errors->first('goal_date') }}</p>
        @endif
        @if($errors->has('goal_contact'))
        <p class="err_msg">見積提示数エラー:{{ $errors->first('goal_contact') }}</p>
        @endif
        @if($errors->has('goal_anken'))
        <p class="err_msg">案件発生数エラー:{{ $errors->first('goal_anken') }}</p>
        @endif
        @if($errors->has('goal_seiyaku'))
        <p class="err_msg">成約数エラー:{{ $errors->first('goal_seiyaku') }}</p>
        @endif
      </div>

      <table class="table table-striped text-center">
          <tr>
            <th>コンタクト数</th>
            <th>見積提示数</th>
            <th>案件発生数</th>
            <th>成約数</th>
          </tr>
          <tr>
            <!-- <th>4月</th> -->
            <div class="input-group">
              <td>{{ Form::number('goal_contact',null,['class' => 'form-control','id' => 'copyTarget']) }}</td>
              <td>{{ Form::number('goal_mitsumori',null,['class' => 'form-control']) }}</td>
              <td>{{ Form::number('goal_anken',null,['class' => 'form-control']) }}</td>
              <td>{{ Form::number('goal_seiyaku',null,['class' => 'form-control']) }}</td>
            </div>
          </tr>
          <!-- <tr>
            <th>5月</th>
            {{ Form::hidden('goal_date',\Carbon\Carbon::now()->format('Y').'05',['class' => 'form-controll', 'placeholdaer' =>'201901']) }}
            <td>{{ Form::number('goal_contact',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_mitumori',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_anken',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_seiyaku',null,['class' => 'form-control']) }}</td>
          </tr>
          <tr>
            <th>6月</th>
            {{ Form::hidden('goal_date',\Carbon\Carbon::now()->format('Y').'06',['class' => 'form-controll', 'placeholdaer' =>'201901']) }}
            <td>{{ Form::number('goal_contact',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_mitumori',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_anken',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_seiyaku',null,['class' => 'form-control']) }}</td>
          </tr>
          <tr>
            <th>7月</th>
            {{ Form::hidden('goal_date',\Carbon\Carbon::now()->format('Y').'07',['class' => 'form-controll', 'placeholdaer' =>'201901']) }}
            <td>{{ Form::number('goal_contact',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_mitumori',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_anken',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_seiyaku',null,['class' => 'form-control']) }}</td>
          </tr>
          <tr>
            <th>8月</th>
            {{ Form::hidden('goal_date',\Carbon\Carbon::now()->format('Y').'08',['class' => 'form-controll', 'placeholdaer' =>'201901']) }}
            <td>{{ Form::number('goal_contact',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_mitumori',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_anken',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_seiyaku',null,['class' => 'form-control']) }}</td>
          </tr>
          <tr>
            <th>9月</th>
            <td>{{ Form::number('goal_contact',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_mitumori',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_anken',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_seiyaku',null,['class' => 'form-control']) }}</td>
          </tr>
          <tr>
            <th>10月</th>
            <td>{{ Form::number('goal_contact',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_mitumori',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_anken',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_seiyaku',null,['class' => 'form-control']) }}</td>
          </tr>
          <tr>
            <th>11月</th>
            <td>{{ Form::number('goal_contact',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_mitumori',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_anken',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_seiyaku',null,['class' => 'form-control']) }}</td>
          </tr>
          <tr>
            <th>12月</th>
            <td>{{ Form::number('goal_contact',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_mitumori',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_anken',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_seiyaku',null,['class' => 'form-control']) }}</td>
          </tr>
          <tr>
            <th>1月</th>
            <td>{{ Form::number('goal_contact',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_mitumori',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_anken',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_seiyaku',null,['class' => 'form-control']) }}</td>
          </tr>
          <tr>
            <th>2月</th>
            <td>{{ Form::number('goal_contact',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_mitumori',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_anken',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_seiyaku',null,['class' => 'form-control']) }}</td>
          </tr>
          <tr>
            <th>3月</th>
            <td>{{ Form::number('goal_contact',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_mitumori',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_anken',null,['class' => 'form-control']) }}</td>
            <td>{{ Form::number('goal_seiyaku',null,['class' => 'form-control']) }}</td>
          </tr> -->
    </table>
    {{ Form::submit('登録',['class' => 'btn btn-primary float-left mr-3 ']) }}
    {{ Form::close() }}
    <a href="{{ route('analysis.index') }}" class="float-right mr-3">戻る</a>

@endsection
<!-- <script>
        function copyToClipboard() {
            // コピー対象をJavaScript上で変数として定義する
            var copyTarget = document.getElementById("copyTarget");
            // コピー対象のテキストを選択する
            copyTarget.select();
            // 選択しているテキストをクリップボードにコピーする
            document.execCommand("Copy");
            // コピーをお知らせする
            alert("コピーできました！ : " + copyTarget.value);
        }
    </script> -->
  </div>
