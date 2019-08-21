<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    public function customer(){
      return $this->belongsTo('App\Customer');
    }

    public function industory(){
      return $this->belongsTo('App\Industory');
    }

    public function product(){
      return $this->belongsTo('App\Product');
    }

    public function test() {
      //経過日数の計算
      $diff_day = HistoryList::orderBy('code', 'desc')->value('created_at')->diffInDays( Carbon::now() );
      //メッセージの表示
      if($diff_day > 30) {
          $message = "これほどまでに更新しないとは。。。。<br>何のために作ったのでしょうか？";
      }elseif($diff_day > 14) {
          $message = "旅行にでも出かけているのでしょうか？それとも・・。<br>せめて1週間に1回以上は入力しましょう。";
      }elseif($diff_day > 7) {
          $message = "少し更新が滞っている様です。なるべく毎日の更新を心がけましょう。";
      }else {
          $message = "";
      }
      return view('pages.home',compact('message','diff_day'));
    }

}
