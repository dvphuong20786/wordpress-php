<?php
header('Content-Type: application/json');

$source_url = "https://phuongdv-theodoi-default-rtdb.firebaseio.com/phuongdv.json";

// Lấy dữ liệu bằng CURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $source_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
$response = curl_exec($ch);
curl_close($ch);

// Decode JSON
$data = json_decode($response, true);

if (!is_array($data)) {
    echo json_encode([
        "status" => "error",
        "message" => "Không lấy được dữ liệu từ Firebase"
    ]);
    exit;
}


// Chuyển dạng map Firebase -> array tuần tự
$result = [];

// 🔥 DUYỆT TẤT CẢ EMAIL
foreach ($data as $email => $list) {

    if (!is_array($list)) continue;

    // 🔥 DUYỆT TỪNG ITEM BÊN TRONG EMAIL
    foreach ($list as $item) {
        if (is_array($item)) {
            $result[] = $item; // gom vào 1 mảng
        }
    }
}


echo json_encode([
    "status" => "success",
    "count" => count($result),
    "data" => $result
], JSON_PRETTY_PRINT);
