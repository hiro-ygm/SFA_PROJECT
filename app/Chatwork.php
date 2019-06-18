<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

define("API_URL", "https://api.chatwork.com");
define("CHATWORK_TOKEN", "d69f80e66a7baa67a122bbe255193d0a");

class Chatwork extends Model
{
    /*
     * ChatWorkにメッセージを投稿する
     * @param integer $room_id ChatWorkのルームID
     * @param string $body 投稿する文字列
     * @return array $result 結果を返す
     */
    public static function postMessage($body, $room_id){
        $headers = [ "X-ChatWorkToken: " . CHATWORK_TOKEN ];
        $option = [ 'body' => $body ];
        $curl = curl_init(API_URL . "/v2/rooms/{$room_id}/messages" );
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($option));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        return redirect('https://www.chatwork.com/#!rid{$room_id}');
    }

}