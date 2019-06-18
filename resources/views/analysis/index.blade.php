@extends('layouts.layout')
@section('content')
<h1>データ分析メニュー</h1>

<div class="row">
  <div class="col-md-4 analysis_item">
    <h6>行動分析</h6>
    <ul>
      <li>コンタクト数</li>
      <li>案件発生数</li>
      <li>見積書提出件数</li>
      <li>成約数</li>
    </ul>
  </div>
  <div class="col-md-4 analysis_item">
    <h6>成約率<h6>
    <ul>
      <li>コンタクト→案件発生率</li>
      <li>案件発生→見積書提出率</li>
      <li>見積書提出→成約件率</li>
    </ul>
  </div>
  <div class="col-md-4 analysis_item">
      <h6>シミュレーション</h6>
      <div>
        <p>目標数→必要コンタクト件数</p>
        <p>※成約件数を入れれば自動でコンタクト数を提示する</p>
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
<div>
@endsection
