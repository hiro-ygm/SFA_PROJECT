@extends('layouts.layout')
@section('title','案件管理一覧')
@section('content')
<div class="container">
  <h1 class="page_title">案件管理メニュー</h1>
  {{ Form::open(['method' => 'get']) }}
    {{ csrf_field() }}
    <div class="search_bar mb-2">
      {{ Form::text('keyword', null, ['class' => 'form-control w-50 float-left', 'placeholder' => '会社名で検索']) }}
      {{ Form::submit('検索', ['class' => 'btn btn-outline-primary float-left ml-1']) }}
      <a href={{ route('project.index') }} class="serch_clear">クリア</a>
      <div class="btn-group ml-3 float-right" role="group" aria-label="Basic example">
        {{ Form::submit('未完', ['class' => 'btn btn-primary', 'name' => 'project_phase_doing']) }}
        {{ Form::submit('完了', ['class' => 'btn btn-primary', 'name' => 'project_phase_finished']) }}
      {{ Form::close() }}
      </div>
      <a href={{ route('project.index') }} class="serch_clear float-right"><button type="button" class="btn btn-primary">全て</button></a>
      <div class="clear"></div>
    </div>

    <div class="float-left">
      <a href="{{ route('project.create') }}"><button type="button" class="btn btn-success mb-1">新規作成</button></a>
      <strong>合計金額：{{ number_format($total_kingaku) }} 円</strong>
      <strong class="ml-3">{{ $total_kensu }} 件 </strong>
    </div>


  <table class="table text-center">
    <thead class="thead-light">
      <tr>
        <th>案件発生日
          {{ Form::open(['method' => 'get']) }}
            <input type="submit" name="start_date_sort_asc" value="&utrif;">
            <input type="submit" name="start_date_sort_desc" value="&dtrif;">
          {{ Form::close() }}
        </th>
        <th>案件名
          {{ Form::open(['method' => 'get']) }}
            <input type="submit" name="project_name_sort_asc" value="&utrif;">
            <input type="submit" name="project_name_sort_desc" value="&dtrif;">
          {{ Form::close() }}
        </th>
        <th>会社名
          {{ Form::open(['method' => 'get']) }}
            <input type="submit" name="customer_id_sort_asc" value="&utrif;">
            <input type="submit" name="customer_id_sort_desc" value="&dtrif;">
          {{ Form::close() }}
        </th>
        <th>業界
          {{ Form::open(['method' => 'get']) }}
            <input type="submit" name="industory_id_sort_asc" value="&utrif;">
            <input type="submit" name="industory_id_sort_desc" value="&dtrif;">
          {{ Form::close() }}
        </th>
        <th>売上見込金額(円)
          {{ Form::open(['method' => 'get']) }}
            <input type="submit" name="sales_amount_sort_asc" value="&utrif;">
            <input type="submit" name="sales_amount_sort_desc" value="&dtrif;">
          {{ Form::close() }}
        </th>
        <th>商品名
          {{ Form::open(['method' => 'get']) }}
            <input type="submit" name="product_sort_asc" value="&utrif;">
            <input type="submit" name="product_sort_desc" value="&dtrif;">
          {{ Form::close() }}
        </th>
        <th>進捗率
          {{ Form::open(['method' => 'get']) }}
            <input type="submit" name="sintyokuritu_sort_asc" value="&utrif;">
            <input type="submit" name="sintyokuritu_sort_desc" value="&dtrif;">
          {{ Form::close() }}
        </th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($projects as $project)
      <tr>
        <td><a href="{{ route('project.show', ['id' => $project->id]) }}">{{ $project->start_date }}</a></td>
        <td><a href="{{ route('project.show', ['id' => $project->id]) }}">{{ $project->project_name }}</a></td>
        <td><a href="{{ route('project.show', ['id' => $project->id]) }}">{{ $project->customer->company_name }}</a></td>
        <td><a href="{{ route('project.show', ['id' => $project->id]) }}">{{ $project->industory->industory_name }}</a></td>
        <td><a href="{{ route('project.show', ['id' => $project->id]) }}">{{ number_format($project->sales_amount) }}</a></td>
        <td><a href="{{ route('project.show', ['id' => $project->id]) }}">{{ $project->product->product_name }}</a></td>
        <td><a href="{{ route('project.show', ['id' => $project->id]) }}">{{ $project->sintyokuritu . "%" }}</a></td>
        <td>
            <!-- <a class="ml-1" href="{{ route('project.show',['id' => $project->id ]) }}">
              <button type="button" name="button" class="btn btn-outline-dark">
                詳細
              </button>
            </a> -->
            <a class="ml-1" href="{{ route('project.edit',['id' => $project->id ]) }}">
              <button type="button" name="button" class="btn btn-outline-info">
                編集
              </button>
            </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
