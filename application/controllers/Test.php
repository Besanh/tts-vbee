<?php
$arr = array(
	'voice' => 'hn_male_xuantin_vdts_48k-hsmm',
	'text' => 'chao cac ban 2018 2019 2020',
	'username' => 'tvg01',
	'password' => 'tvg01#2019tts'
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://tts.tel4vn.com/api/tts/format/json');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arr));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_USERPWD, $arr['username'] . ":" . $arr['password']);
$headers = array();
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
var_dump($result);
$outputurl = "/var/www/html/abc.mp3";
file_put_contents($outputurl ,$result);
curl_close ($ch);
?>
