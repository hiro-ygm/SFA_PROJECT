<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chatwork;

define("CHATWORK_ROOM_ID", "155404542");

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Chatwork $chatwork)
    {
        $res = $chatwork->getChatroom(CHATWORK_ROOM_ID);
        $contacts_json = $chatwork->getContact(CHATWORK_ROOM_ID);
        $res_array = json_decode($res, true);
        $contacts = json_decode($contacts_json, true);
        return view('/chat/index')->with([
          'res_array' =>$res_array,
          'contacts' =>$contacts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $chatwork = new Chatwork;
        $res = $chatwork->postMessage('おはようございます。 from controller ', CHATWORK_ROOM_ID);
        return $res;
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Chatwork $chatwork, $room_id)
    {
        //

        $chatMessage_json = $chatwork->getChatMessage($room_id);
        $chatMessage = json_decode($chatMessage_json, true);
        return view('/chat/show')->with([
          'chatMessage' =>$chatMessage,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
