<?php 

$token = '5085411899:AAGwI1H5JSUnB2ekTOxxZS_QKtQK_Lk2WCs';
define('API_KEY',$token);
function uzmax($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
 
 function sendaction($chat_id, $action){
 uzmax('sendchataction',[
 'chat_id'=>$chat_id,
 'action'=>$action
 ]);
 }
// ozgaruvchilar
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
//ozgaruvchilar tugadi
// /start
if(preg_match('/^\/([Ss]tart)/',$text)){
$start_time = round(microtime(true) * 1000);
      $send=  uzmax('sendmessage', [
                'chat_id' => $chat_id,
                'text' =>"Tezlik: 0",
            ])->result->message_id;
        
                    $end_time = round(microtime(true) * 1000);
                    $time_taken = $end_time - $start_time;
                    uzmax('editMessagetext',[
                        "chat_id" => $chat_id,
                        "message_id" => $send,
                        "text" => "Bot Tezlik: " . $time_taken . " ms",
                    ]);
}


?>
