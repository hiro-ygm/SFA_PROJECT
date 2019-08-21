<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chatwork;


// 「チャット」ページの処理
//  @author 廣瀬大助(hirohiroygm@gmail.com)

define("CHATWORK_ROOM_ID", "155404542");
define("CHATWORK_ACCOUNT_ID", "3979900");

class ChatController extends Controller
{
    /**
     * チャットルーム一覧、コンタクト一覧画面を表示する
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Chatwork $chatwork)
    {
      //自分のコンタクトになっているユーザー一覧を取得
        $res = $chatwork->getChatroom(CHATWORK_ROOM_ID);
        $res_array = json_decode($res, true);
        $contacts_json = $chatwork->getContact(CHATWORK_ROOM_ID);
        $contacts = json_decode($contacts_json, true);
        return view('/chat/index')->with([
          'res_array' =>$res_array,
          'contacts' =>$contacts,
        ]);
    }

    /**
     * 新規作成画面を表示する
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $room_id = $request->room_id;
        $chatTalk = $request->chatTalk;
        $chatwork = new Chatwork;
        $res = $chatwork->postMessage($chatTalk, $room_id);
        return redirect()->route('chat.show', ['room_id' => $room_id]);
      }


    /**
     * チャットルームを表示する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($room_id, Chatwork $chatwork)
    {
        //
        $res = $chatwork->getChatroom($room_id);
        $res_array = json_decode($res, true);
        $rooms = var_export(array_column($res_array, 'name', 'room_id'));
        $chat_account_id = CHATWORK_ACCOUNT_ID;

        $chatMessage_json = $chatwork->getChatMessage($room_id);
        $chatMessage = json_decode($chatMessage_json, true);
        return view('/chat/show')->with([
          'chatMessage' =>$chatMessage,
          'room_id' => $room_id,
          'rooms' => $rooms,
          'chat_account_id' => $chat_account_id,
        ]);
    }

    /**
     * チャットを削除する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($room_id,Chatwork $chatwork,Request $request)
    {
        //
        $message_id = $request->message_id;
        $chatwork->deleteChatMessage($room_id,$message_id);
        return redirect()->route('chat.show', ['room_id' => $room_id]);
    }
}
