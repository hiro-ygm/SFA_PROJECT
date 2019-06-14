@extends('layouts.layout')
@section('content')
      <h1>メニュー</h1>
      <ul>
        <li><a href="{{ route('calendar.index') }}">カレンダー</a></li>
        <li><a href="{{ route('project.index') }}">案件管理</a></li>
        <li><a href="{{ route('customer.index') }}">取引先</a></li>
        <li><a href="{{ route('chat.index') }}">チャット／通話</a></li>
        <li><a href="{{ route('analysis.index') }}">データ分析</a></li>
      </ul>
@endsection
