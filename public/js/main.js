(function(){
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


})();
