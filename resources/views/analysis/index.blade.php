@extends('layouts.layout')
@section('content')
<div class="container">
  <h1 class="page_title float-left">データ分析メニュー</h1>
  <div class="btn-group float-left ml-3" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-secondary">個人</button>
    <button type="button" class="btn btn-secondary">全体</button>
  </div>
  <div class="btn-group float-left ml-3" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-secondary">月間</button>
    <button type="button" class="btn btn-secondary">年間</button>
  </div>
  <div class="clear"></div>

  <h6>行動分析</h6>
  <div class="row">
    <div class="col-md-3 analysis_item">
        <p>コンタクト数</p>
        <p>＿＿件</p>
    </div>
    <div class="col-md-3 analysis_item">
        <p>見積書提出数</p>
        <p>＿＿件</p>
        <p>前フェーズからの移行率＿＿％</p>
    </div>
    <div class="col-md-3 analysis_item">
        <p>案件発生数</p>
        <p>＿＿件</p>
        <p>前フェーズからの移行率＿＿％</p>
    </div>
    <div class="col-md-3 analysis_item">
        <div>
          <p>成約件数</p>
          <p>＿＿件</p>
          <p>前フェーズからの移行率＿＿％</p>
          <hr>
          <p>目標件数</p>
          {{ Form::open(['method' => 'get']) }}
            {{ csrf_field() }}
          <div class="form-group">
            {{ Form::text('keyword', null, ['class' => 'form-control w-50 float-left mb-2']) }}
          </div>
          {{ Form::submit('検索', ['class' => 'btn btn-outline-primary float-left ml-1 mb-2']) }}
          {{ Form::close() }}

        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 analysis_item">
      <h6>売上分析</h6>
      <ul>
        <li>前年比</li>
        <li>3年分表示</li>
        <li>翌年予測</li>
      </ul>
    </div>

    <div class="col-md-6 analysis_item">
      <h6>構成比(年単位)</h6>
      <ul>
        <li>業界別</li>
        <li>顧客別</li>
      </ul>
    </div>
</div>
@endsection
