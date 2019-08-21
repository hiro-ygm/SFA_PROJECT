@extends('layouts.layout')
@section('content')
<div class="container">
  <h1 class="page_title">顧客管理メニュー</h1>
  @include('layouts.search')
  <button type="button" class="btn btn-success mb-1"><a href="#">新規作成</a></button>
  <table class="customer_table table customer">
    <thead class="thead-light">
      <tr>
        <th></th>
        <th>個人名</th>
        <th>メールアドレス</th>
        <th>携帯電話番号</th>
        <th>会社名</th>
        <th>部署名</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td><img src={{ asset("storage/". $user->image_url) }} ></td>
        <td>  {{ $user->user_name }}</td>
        <td>  {{ $user->email }}</td>
        <td>  {{ $user->mobile_telno }}</td>
        <td>  {{ $user->company_name }}</td>
        <td>  {{ $user->department }}</td>
        <td><a href="{{ route('calendar.detail', 'id' => $user_id) }}">詳細</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModal3Label">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" id="delete_btn">削除</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
