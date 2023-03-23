<?php
session_start();

$url = "https://script.google.com/macros/s/AKfycbzAq6O0ob3ThBm5V7ZK-cv-TE9TfNWyHNBJ4XRukmH2S95u734-d_fx0UF7AcspmAA4/exec";
$postData = [
   "action" => "login",
   "email" => $_POST['email'],
   "password" => $_POST['password']
];

$ch = curl_init($url);
curl_setopt_array($ch, [
   CURLOPT_FOLLOWLOCATION => true,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_POSTFIELDS => $postData
]);

$result = curl_exec($ch);
$result = json_decode($result, 1);

if($result['status'] == "success"){
   $_SESSION['user'] = $result['data'];
   header("https://experience.arcgis.com/builder/?id=e4ea2315977a411288b03ef8e3330a21");
}else{
   $_SESSION['error'] = $result['message'];
   header("location: login.php");
}

