<?php 
 
if (!file_exists('madeline.php')) { 
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php'); 
} 
include 'madeline.php';  
 
$MadelineProto = new \danog\MadelineProto\API('session.madeline'); 
$MadelineProto->start(); 

// xxhours
$soate = date("H",strtotime("0 hour"));
$xxh = str_replace(["0","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","00"],["⁰","¹","²","³","⁴","⁵","⁶","⁷","⁸","⁹","¹⁰","¹¹","¹²","¹³","¹⁴","¹⁵","¹⁶","¹⁷","¹⁸","¹⁹","²⁰","²¹","²²","²³","⁰⁰"], $soate);
//xxminut
$sekunde= date("i",strtotime("0 hour"));
$xxm = str_replace(["0","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","00"],["⁰","¹","²","³","⁴","⁵","⁶","⁷","⁸","⁹","¹⁰","¹¹","¹²","¹³","¹⁴","¹⁵","¹⁶","¹⁷","¹⁸","¹⁹","²⁰","²¹","²²","²³","²⁴","²⁵","²⁶","²⁷","²⁸","²⁹","³⁰","³¹","³²","³³","³⁴","³⁵","³⁶","³⁷","³⁸","³⁹","⁴⁰","⁴¹","⁴²","⁴³","⁴⁴","⁴⁵","⁴⁶","⁴⁷","⁴⁸","⁴⁹","⁵⁰","⁵¹","⁵²","⁵³","⁵⁴","⁵⁵","⁵⁶","⁵⁷","⁵⁸","⁵⁹","⁰⁰"], $sekunde);

$time=date("H:i",strtotime("0 hour")); 
$kun=date("d-m-Y",strtotime("0 hour")); 
$input = [" Happy New Year🎄","My life this is my familiy❤️","My life this is my familiy❤","My life this is my familiy❤️","My life this is my familiy❤️"]; 
  $rand=array_rand($input); 
  $text="$input[$rand]"; 
 $nik = [" $xxh:$xxm "]; 
  $nikrand=array_rand($nik); 
  $niktxt="$nik[$nikrand]"; 
$MadelineProto->account->updateProfile(['last_name'=>"$niktxt", 'about'=>" $text "]); 
$MadelineProto->account->updateStatus(['offline' => false, ]); 

$yil = date("Y", strtotime("0 hour")); 
$sana = date("d/m/Y", strtotime("0 hour")); 
 

$logo = ["http://soat.ga/files/apilar/1.php?text=$time"];
  $logorand=array_rand($logo);
  $logopic="$logo[$logorand]";

if($yil == "2022"){
header('Content-type: image/jpg');
file_put_contents("got.jpg",file_get_contents($logopic));
$info = $MadelineProto->get_full_info('me');
$inputPhoto = ['_' => 'inputPhoto', 'id' => $info['User']['photo']['photo_id'], 'access_hash' => $info['User']['access_hash'], 'file_reference' => 'bytes'];
$deletePhoto = $MadelineProto->photos->deletePhotos(['id'=>[$inputPhoto]]);
}
$MadelineProto->photos->updateProfilePhoto(['file' => "got.jpg" ]);
 
$Bool=$MadelineProto->messages->hideReportSpam(['peer'=>2067700229,]);
?>