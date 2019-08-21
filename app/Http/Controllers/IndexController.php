<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


// 「トップページ」の処理をまとめたクラス
//  @author 廣瀬大助(hirohiroygm@gmail.com)
class IndexController extends Controller
{
// トップページの表示
// @param なし
// @return \Illuminate\Http\Response
    public function index(){
      return view('/index');
    }
}
