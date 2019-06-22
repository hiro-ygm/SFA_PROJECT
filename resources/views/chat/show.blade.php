@extends('layouts.layout')
@section('content')
<div class="container">

  {{ Form::open(['method' => 'get']) }}
  {{ csrf_field() }}
  <div class="search_bar mb-2">
    {{ Form::text('keyword', null, ['class' => 'form-control w-50 float-left']) }}
    {{ Form::submit('検索', ['class' => 'btn btn-outline-primary float-left ml-1']) }}
    <div class="clear"></div>
  </div>
  {{ Form::close() }}

  <table class="table">
  @for($i=0;$i < count($chatMessage); $i++)
  <tr>
    <td>
      <img src="{{ $chatMessage[$i]['account']['avatar_image_url'] }}">
    </td>
    <td>
      {{ $chatMessage[$i]['account']['name'] }}
    </td>
    <td>
      {{ $chatMessage[$i]['body'] }}
    </td>
  @endfor
  </table>
</div>
