@extends('layouts.layout')
@section('content')
<div class="container">
  <h1 class="page_title">メインメニュー</h1>
  <div class="row">
    <div class="col-md-4 menu_item"><a href="{{ route('calendar.index') }}"><img  src={{ asset("/img/calendar.jpeg") }}>スケジュール</a></div>
    <div class="col-md-4 menu_item"><a href="{{ route('project.index') }}"><img  src={{ asset("/img/meeting.jpeg") }}>案件管理</a></div>
    <div class="col-md-4 menu_item"><a href="{{ route('customer.index') }}"><img src={{ asset("/img/shakehand.jpeg") }}>取引先</a></div>
  </div>
  <div class="row">
    <div class="col-md-4 menu_item"><a href="{{ route('chat.index') }}"><img src={{ asset("/img/phone_chat.jpeg") }}>チャット</a></div>
    <div class="col-md-4 menu_item"><a href="{{ route('analysis.index') }}"><img src={{ asset("/img/PAK85_deskshiryou20131223_TP_V1.jpg") }}>データ分析</a></div>
    <div class="col-md-4 menu_item border-0"></div>
  </div>
</div>
@endsection
