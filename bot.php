<?php
ob_start();
$token = "5233716091:AAGH3pBXf1CBDXryQdn1bQ0h1pc6TMGSx6M"; // bot token
define("API_KEY",$token);
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
$JJJ22J = http_build_query($datas);
$url = "https://api.telegram.org/bot".API_KEY."/".$method."?$JJJ22J";
$JJJ22J = file_get_contents($url);
return json_decode($JJJ22J);
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$name = $up->from->first_name;
$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$txt = $message->caption;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$new = $message->new_chat_members;
$mid = $message->message_id;
$type = $message->chat->type;
$name = $message->from->first_name;



if(isset($update->callback_query)){

$up = $update->callback_query;
$chat_id = $up->message->chat->id;
$from_id = $up->from->id;
$user = $up->from->username;
$name = $up->from->first_name;
$message_id = $up->message->message_id;
$data = $up->data;
}

if ($text == '/start') {
bot('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$mid,
'text'=>"Salom @UzTubeBot'ga Xush kelibsiz!

Iltimos, istalgan utube video havolasini yuboring yoki @vid inline rejimidan foydalanib qidiring.",
'parse_mode'=>"MarkDown",
]);
}

if(preg_match('/(https|http)/',$text)){
$stm = round(microtime(true));
	bot('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$mid,
'text'=>"Iltimos kuting. Yuklanmoqda!"
]);
$Bero1= json_decode(file_get_contents("http://darr.zzz.com.ua/api/Yt.php?url=".$text),1);
$yt1= json_decode(file_get_contents("http://dilshod1643.jizzax.ru/yt.php?url=".$text),1);
$title2= $yt1["title"];
$Bero2= $Bero1["result"];
$okk = bot('sendvideo',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$mid,
'video'=>$Bero2,
"parse_mode"=>"markdown",
'caption'=>"$title2\n🌐 @UzTubeBot"
]);
if($okk->ok){
$endt = round(microtime(true));
$tims = $endt - $stm;
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🧭 $tims sekundda yuklandi!",
'parse_mode'=>"MarkDown",
]);
}else{
 bot('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$mid,
'text'=>"Xatolik yuz berdi!",
'parse_mode'=>"MarkDown",
]);
}
}



if($text=="/tezlik"){
$start_time = round(microtime(true) * 1000);
$send=  bot('sendmessage', [
'chat_id' => $chat_id,
'text' =>"Kuting...",
])->result->message_id;

$end_time = round(microtime(true) * 1000);
$time = $end_time - $start_time;
  bot('editMessagetext',[
"chat_id" => $chat_id,
"message_id" => $send,
"text" => "Bot Tezliki: " . $time .  "Ms",
]);
}
