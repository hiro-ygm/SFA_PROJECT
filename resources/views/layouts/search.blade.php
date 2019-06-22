{{ Form::open(['method' => 'get']) }}
  {{ csrf_field() }}
  <div class="search_bar mb-2">
    {{ Form::text('keyword', null, ['class' => 'form-control w-50 float-left']) }}
    {{ Form::submit('検索', ['class' => 'btn btn-outline-primary float-left ml-1']) }}
    <a href={{ route('customer.index') }} class="serch_clear">クリア</a>
    <div class="clear"></div>
  </div>
{{ Form::close() }}
