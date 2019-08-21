@extends('layouts.layout')
@section('title','データ分析目標一覧')
@section('content')

<div class="container">
  <div class="detail_container">
    <h2>目標設定</h2>
    <a href="{{ route('analysis.create') }}">新規作成</a>
    <table class="table table-striped text-center mt-2">
      <tr>
        <th>年度</th>
        <th>コンタクト数</th>
        <th>見積提示数</th>
        <th>案件発生数</th>
        <th>成約数</th>
        <th></th>
      </tr>
      @foreach($goals as $goal)
      <tr>
          {{ Form::hidden('id',$goal->id) }}
          <td>{{ $goal->goal_date }}</td>
          <td>{{ $goal->goal_contact }}</td>
          <td>{{ $goal->goal_mitsumori }}</td>
          <td>{{ $goal->goal_anken }}</td>
          <td>{{ $goal->goal_seiyaku }}</td>
          <td><a href="{{ route('analysis.edit',$goal->id) }}" class=" mr-3">変更</a></td>
      </tr>
      @endforeach
      </table>
    <a href="{{ route('analysis.index') }}" class="float-right mr-3">戻る</a>


@endsection
</div>
