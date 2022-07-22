<?php

$ini = parse_ini_file('../data.ini');

$urlImg = $ini['IMG'];
$url = $ini['url'];
$token = $ini['token'];
$serverKey = $ini['serverKey'];
$title = $ini['title'];
$body = $ini['body'];

$notification = array('title' => $title, 'body' => $body, 'sound' => 'default', 'badge' => '1',  "image" => $urlImg,  );
$data = array('click_action' => 'https://www.google.com.br');
$arrayToSend = array('to' => $token, 'notification' => $notification, 'priority' => 'high', 'data' => $data );

$json = json_encode($arrayToSend);
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: key=' . $serverKey;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

if ($response === FALSE) {
    die('FCM Send Error: ' . curl_error($ch));
}
curl_close($ch);
