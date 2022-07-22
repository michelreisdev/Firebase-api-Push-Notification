<?php
$img = 'https://d3ugyf2ht6aenh.cloudfront.net/stores/002/007/282/themes/common/logo-1512487490-1650888813-b7a11699b80f2c22ab3ebbeaf2c4950c1650888813-320-0.png?0';
$url = "https://fcm.googleapis.com/fcm/send";
$token = "fAfJNw2sSRmkrykvULdK7c:APA91bGwEOq85anIEKcYspu-06xzzUE9sz0gemca8rQrk6_BvZK2wENopKqODXMrJKpnyiN_DxAeL2E0xRJa6kccdW9ahep_O2ETXg_G3jWJSWwSbPne7Rd0VRqqEuB2HgjnNVKuiNks";
$serverKey = 'AAAAEjut24E:APA91bE58LUS7zpNwCNJ7Dk3WmM30hz0YDpytMiHYushWbB5djUcBUcQ2ffgTx1x6mGDM_dBEMoZFDvG0GJGaio8flB9DVx0nt5MdNWxrsDu7ZP5Dhypf2mU0xZZjeow8HnmXqW_WYQg';
$title = "Notificação DT3 😊";
$body = "💪 Seu pedido está em sepação. 💪";




$notification = array('title' => $title, 'body' => $body, 'sound' => 'default', 'badge' => '1',  "image" => $img,  );
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
