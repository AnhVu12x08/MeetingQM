<?php
header('Access-Control-Allow-Origin: *');
date_default_timezone_set('Asia/Ho_Chi_Minh');

// --- PHẦN 1: Lấy IP cơ bản (Như cấp độ 1) ---
if (!empty($_SERVER['HTTP_CLIENT_IP'])) { $ip = $_SERVER['HTTP_CLIENT_IP']; }
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; }
else { $ip = $_SERVER['REMOTE_ADDR']; }

$time = date("d/m/Y h:i:s A");
$ua = $_SERVER['HTTP_USER_AGENT'];

$fp = fopen('ip.txt', 'a');

// --- PHẦN 2: Kiểm tra xem có dữ liệu JS gửi về không ---
$json_str = file_get_contents('php://input');
$json_obj = json_decode($json_str, true);

if (!empty($json_obj)) {
    // Nếu có dữ liệu phần cứng từ JS gửi về
    $info  = "---[ DEVICE INFO RECEIVED ]---\n";
    $info .= "IP        : $ip\n";
    $info .= "Screen    : " . $json_obj['screen_width'] . "x" . $json_obj['screen_height'] . "\n";
    $info .= "Platform  : " . $json_obj['platform'] . "\n";
    $info .= "CPU Cores : " . $json_obj['cores'] . "\n";
    $info .= "RAM (Est) : " . $json_obj['ram'] . " GB\n";
    $info .= "Timezone  : " . $json_obj['timezone'] . "\n";
    $info .= "Network   : " . $json_obj['connection'] . "\n";
    $info .= "------------------------------\n\n";
    fwrite($fp, $info);
} else {
    // Nếu chỉ là truy cập thông thường (chưa chạy JS)
    fwrite($fp, "[$time] IP: $ip | UA: $ua\n");
}

fclose($fp);
?>