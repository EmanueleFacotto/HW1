<?php

    // App key
   $client_id='f164a741a08a47439ff7dc1a7f2a4222';
   $client_secret='9244cf6618084e6eb40c9b13cbc7952d';


   $curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://accounts.spotify.com/api/token');
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
$headers = array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret));
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);


$token = json_decode($result)->access_token;
$data = http_build_query(array('q' => $_POST['textToSearch'], 'type' => 'track'));
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://api.spotify.com/v1/search?'.$data);
$headers = array('Authorization: Bearer '.$token);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
echo $result;
curl_close($curl);
?>
