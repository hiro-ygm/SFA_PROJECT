@extends('layouts.layout')
@section('content')
<h1>顧客管理メニュー</h1>

<table class="table customer">
  <thead class="thead-light">
    <tr>
      <th>#</th>
      <th>アイコン</th>
      <th>個人名</th>
      <th>メールアドレス</th>
      <th>会社名</th>
      <th>部署名</th>
      <!-- <th>会社所在地</th>
      <th>会社TEL</th>
      <th>携帯TEL</th>
      <th>会社URL</th> -->
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><a href="#" data-toggle="modal" data-target="#exampleModal3">1</a></th>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3"><img alt="男性顔写真" src={{ asset("img/youngman_25.png") }} ></a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">山田　太郎</a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">yamadataro@zmail.jp</a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">A株式会社</a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">商品デザイン部</a></td>
      <!-- <td><a href="#" data-toggle="modal" data-target="#exampleModal3">東京都大田区</a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">http://AAA.com</a></td> -->
    </tr>
    <tr>
      <th scope="row"><a href="#" data-toggle="modal" data-target="#exampleModal3">2</a></th>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3"><img alt="男性顔写真" src={{ asset("img/youngman_25.png") }} ></a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">山田　太郎</a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">yamadataro@zmail.jp</a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">A株式会社</a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">商品デザイン部</a></td>
      <!-- <td><a href="#" data-toggle="modal" data-target="#exampleModal3">東京都大田区</a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">http://AAA.com</a></td> -->
    </tr>
    <tr>
      <th scope="row"><a href="#" data-toggle="modal" data-target="#exampleModal3">3</a></th>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3"><img alt="男性顔写真" src={{ asset("img/youngman_25.png") }} ></a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">山田　太郎</a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">yamadataro@zmail.jp</a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">A株式会社</a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">商品デザイン部</a></td>
      <!-- <td><a href="#" data-toggle="modal" data-target="#exampleModal3">東京都大田区</a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">http://AAA.com</a></td> -->
    </tr>
    <tr>
      <th scope="row"><a href="#" data-toggle="modal" data-target="#exampleModal3">4</a></th>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3"><img alt="男性顔写真" src={{ asset("img/youngman_25.png") }} ></a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">山田　太郎</a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">yamadataro@zmail.jp</a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">A株式会社</a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">商品デザイン部</a></td>
      <!-- <td><a href="#" data-toggle="modal" data-target="#exampleModal3">東京都大田区</a></td>
      <td><a href="#" data-toggle="modal" data-target="#exampleModal3">http://AAA.com</a></td> -->
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


@endsection
