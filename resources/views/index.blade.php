@extends('layouts.layout')
@section('content')
<h1>メニュー</h1>
<div class="row">
  <div class="col-md-3 menu_item"><a href="{{ route('calendar.index') }}"><img src={{ asset("/img/calender_takujou.png") }}>スケジュール</a></div>
  <div class="col-md-3 menu_item"><a href="{{ route('project.index') }}"><img src={{ asset("/img/kaigi_man2.png") }}>案件管理</a></div>
  <div class="col-md-3 menu_item"><a href="{{ route('customer.index') }}"><img src={{ asset("/img/meishikoukan_youngman.png") }}>取引先</a></div>
</div>
<div class="row">
  <div class="col-md-3 menu_item"><a href="{{ route('chat.index') }}"><img src={{ asset("/img/computer_message_app.png") }}>チャット</a></div>
  <div class="col-md-3 menu_item"><a href="{{ route('analysis.index') }}"><img src={{ asset("/img/thumbnail_graph3_oresen.jpg") }}>データ分析</a></div>
  <div class="col-md-3 menu_item border-0"></div>
</div>
@endsection
