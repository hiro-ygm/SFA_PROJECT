$(function(){
'use strict';


// 削除ボタン

$('#delete_btn').click(function(){
    if(!confirm('本当に削除しますか？')){
        /* キャンセルの時の処理 */
        return false;
    }else{
        /*　OKの時の処理 */
        $('.modal').modal('hide');
        $(this).dialog('close');
    }
});


// チャット関連
// const API_URL = "https://api.chatwork.com"
// const API_TOKEN = "d69f80e66a7baa67a122bbe255193d0a"
//
// // チャットルーム、コンタクトを押下するとチャット一覧が表示される
// $('.chatMessage').on('click', function(event){
//   event.preventDefault();
//   $.ajax({
//     url: API_URL + "/v2/rooms/" + $('.chatMessage').data('room_id') + "/messages?force=1",
//     type: 'GET',
//     dataType: 'jsonp',
//     headers: {
//     'X-ChatWorkToken': API_TOKEN,
//     'Content-Type': 'application/json'
//     },
//   }).done(function(data){
//     console.log('data');
//   });
//
//
// });



});
