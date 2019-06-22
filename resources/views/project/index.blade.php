@extends('layouts.layout')
@section('content')
<div class="container">
  <h1 class="page_title">案件管理メニュー</h1>

  <table class="table">
    <thead class="thead-light">
      <tr>
        <th>#</th>
        <th>コンタクト日</th>
        <th>会社名</th>
        <th>案件名</th>
        <th>商談プロセス</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row"><a href="#" data-toggle="modal" data-target="#exampleModal3">1</a></th>
        <td><a href="#" data-toggle="modal" data-target="#exampleModal3">2019-01-01(火)</a></td>
        <td><a href="#" data-toggle="modal" data-target="#exampleModal3">A株式会社</a></td>
        <td><a href="#" data-toggle="modal" data-target="#exampleModal3">商品Aの件</a></td>
        <td><a href="#" data-toggle="modal" data-target="#exampleModal3">仕様検討</a></td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>2019-01-02(水)</td>
        <td>B株式会社</td>
        <td>商品Bの件</td>
        <td>価格交渉</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>2019-01-03(木)</td>
        <td>C株式会社</td>
        <td>商品Cの件</td>
        <td>価格交渉</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>2019-01-04(金)</td>
        <td>D株式会社</td>
        <td>商品Dの件</td>
        <td>契約</td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>2019-01-07(月)</td>
        <td>E株式会社</td>
        <td>商品Eの件</td>
        <td>課題発見</td>
      </tr>
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
