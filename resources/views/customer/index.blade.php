@extends('layouts.layout')
@section('title','顧客管理一覧')
@section('content')
<div class="container">
  <h1 class="page_title">顧客管理メニュー</h1>
  @include('layouts.search')
  <a href="{{ route('customer.create') }}"><button type="button" class="btn btn-success mb-1">新規作成</button></a>
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
      @foreach($customers as $customer)
      <tr>
        @if($customer->image_url)
        <td><img src={{ asset("storage/". $customer->image_url) }} ></td>
        @else
        <td></td>
        @endif
        <td><a href="{{ route('customer.show',['id' => $customer->id]) }}">{{ $customer->customer_name }}</a></td>
        <td><a href="{{ route('customer.show',['id' => $customer->id]) }}">{{ $customer->email }}</a></td>
        <td><a href="{{ route('customer.show',['id' => $customer->id]) }}">{{ $customer->mobile_telno }}</a></td>
        <td><a href="{{ route('customer.show',['id' => $customer->id]) }}">{{ $customer->company_name }}</a></td>
        <td><a href="{{ route('customer.show',['id' => $customer->id]) }}">{{ $customer->department }}</a></td>
        <td>
            <!-- <a class="ml-1" href="{{ route('customer.show',['id' => $customer->id ]) }}">
              <button type="button" name="button" class="btn btn-outline-dark">
                詳細
              </button>
            </a> -->
            <a class="ml-1" href="{{ route('customer.edit',['id' => $customer->id ]) }}">
              <button type="button" name="button" class="btn btn-outline-info">
                編集
              </button>
            </a>
        </td>
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
