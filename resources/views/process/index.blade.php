@extends('layouts.layout')
@section('title','営業プロセス管理')
@section('content')

<div class="container">
  <div class="calendar float-left w-25">
    <h2 class="contents_title">営業プロセス管理</h2>
    <table class="table calendarTable table-bordered">
      <thead>
        <tr>
          <th colspan="2"><a href="#">前月</a></th>
          <!-- <th colspan="3"><a href="#">{{ $dates[10]->format('Y年') }}</a></th>
          <th colspan="2"><a href="#">{{ $dates[10]->format('m月') }}</a></th> -->
          <th colspan="3">{{ $dates[10]->format('Y年m月') }}</th>
          <th colspan="2"><a href="#">次月</a></th>
        </th>
        </tr>
        <tr>
          @foreach (['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
          <th>{{ $dayOfWeek }}</th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach ($dates as $date)
        @if ($date->dayOfWeek == 0)
        <tr>
          @endif
          <td  @if($date == \Carbon\Carbon::today()) class="today text-center" @endif class="text-center" >
            {{ $date->day }}
        </td>
        @if ($date->dayOfWeek == 6)
        </tr>
        @endif
        @endforeach
        <th colspan="7"><a href="#">今月</a></th>
      </tbody>
    </table>
  </div>
<!-- イベント表示部分 -->
  <div class="event_container float-right w-75 pl-5">
    <h2 class="contents_title">コンタクト履歴</h2>
      <!-- 検索バー -->
      {{ Form::open(['method' => 'get']) }}
        {{ csrf_field() }}
        <div class="search_bar mb-2">
          {{ Form::text('keyword', null, ['class' => 'form-control w-50 float-left']) }}
          {{ Form::submit('検索', ['class' => 'btn btn-outline-primary float-left ml-1']) }}
          <a href={{ route('process.index') }} class="serch_clear">クリア</a>
          <div class="btn-group ml-3 float-right" role="group" aria-label="Basic example">
            <!-- {{ Form::submit('未完', ['class' => 'btn btn-primary', 'name' => 'process_doing']) }}
            {{ Form::submit('完了', ['class' => 'btn btn-primary', 'name' => 'process_finished']) }} -->
          {{ Form::close() }}
          </div>
          <!-- <a href={{ route('process.index') }} class="serch_clear float-right"><button type="button" class="btn btn-primary">全て</button></a> -->
          <div class="clear"></div>
        </div>
      {{ Form::close() }}
      <a href="{{ route('process.create') }}"><button type="button" class="float-left ml-1 btn btn-success mb-1">新規作成</button></a>
      {{ Form::open(['method' => 'get']) }}
        {{ Form::submit('疎遠注意', ['name' => 'alart_yellow', 'class' => 'btn btn-warning mb-1 float-left ml-1']) }}
        {{ Form::submit('疎遠警告', ['name' => 'alart_red', 'class' => 'btn btn-danger mb-1 float-left ml-1']) }}
      {{ Form::close() }}
      <a href={{ route('process.index') }} class="serch_clear float-right"><button type="button" class="btn btn-primary">全て</button></a>
      <table class="table eventTable table-striped">

          <tr>
            <th>コンタクト日
              {{ Form::open(['method' => 'get']) }}
                <input type="submit" name="contact_sort_asc" value="&utrif;">
                <input type="submit" name="contact_sort_desc" value="&dtrif;">
              {{ Form::close() }}
            </th>
            <th>面談者名
              {{ Form::open(['method' => 'get']) }}
              <input type="submit" name="customer_sort_asc" value="&utrif;">
              <input type="submit" name="customer_sort_desc" value="&dtrif;">
              {{ Form::close() }}
            </th>
            <th>会社名
            <!-- {{ Form::open(['method' => 'get']) }}
              <input type="submit" name="company_sort_asc" value="&utrif;">
              <input type="submit" name="company_sort_desc" value="&dtrif;">
            {{ Form::close() }} -->
            </th>
            <th>目的
            {{ Form::open(['method' => 'get']) }}
              <input type="submit" name="purpose_sort_asc" value="&utrif;">
              <input type="submit" name="purpose_sort_desc" value="&dtrif;">
            {{ Form::close() }}
            </th>
            <th>メモ</th>
            <th></th>
          </tr>

          @foreach($processes as $process)
          <tr>
            <td><a href="{{ route('process.show', ['id' => $process->id]) }}">{{ $process->contact_date }}</a></td>
            <td><a href="{{ route('process.show', ['id' => $process->id]) }}">{{ $process->customer->customer_name }} 様</a></td>
            <td><a href="{{ route('process.show', ['id' => $process->id]) }}">{{ $process->customer->company_name }}</a></td>
            <td><a href="{{ route('process.show', ['id' => $process->id]) }}">{{ $process->purpose }}</a></td>
            <td class="memo"><a href="{{ route('process.show', ['id' => $process->id]) }}">{{ $process->memo }}</a></td>
            <td>
                <!-- <a class="ml-1" href="{{ route('process.show', ['id' => $process->id]) }}">
                  <button type="button" name="button" class="btn btn-outline-info">
                    詳細
                  </button>
                </a> -->
                <a class="ml-1" href="{{ route('process.edit' ,['id' => $process->id]) }}">
                  <button type="button" name="button" class="btn btn-sm btn-outline-info">
                    編集
                  </button>
                </a>
            </td>
          </tr>
          @endforeach

      </table>
  </div>

</div>

@endsection
