<?php

// =========================
//  CẤU HÌNH FIREBASE SOURCES
// =========================
$sources = [
    "dvphuong.dev@gmail.com",
    "dv.francois207.4@gmail.com",
    "dv.francois207.5@gmail.com",
    "khanhln935@gmail.com",
    "tthnguyen18@gmail.com"
];


// =========================
//  KẾT NỐI DATABASE
// =========================
// $mysqli = new mysqli("localhost", "root", "", "thiennhanweb");
$mysqli = new mysqli("sql103.infinityfree.com", "if0_40475278", "8P0ppJtY4JHcfEO", "if0_40475278_wp646");
// $mysqli = new mysqli("sql103.byetcluster.com", "40475278_3", "QS1p98(4@j", "if0_40475278_wp646");

if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => "Kết nối database thất bại: " . $mysqli->connect_error
    ]);
    exit();
}



// =========================
//  LẤY DATA TỪ FIREBASE VÀ MERGE
// =========================
$merged = [];

foreach ($sources as $sourceKey) {
    $sourceKey = str_replace('.', '_', $sourceKey);
    $url = "https://phuongdv-theodoi-default-rtdb.firebaseio.com/data/{$sourceKey}.json"; 
    
    $json = @file_get_contents($url);
    if ($json === false) continue;

    $data = json_decode($json, true);
    if (!is_array($data)) continue;

    foreach ($data as $item) {
        // Merge theo ID: nếu trùng thì cập nhật dữ liệu mới nhất
        $merged[$item['id']] = $item;
    }
}



// Chuyển mảng associative sang indexed array
$mergedArray = array_values($merged);


// Trả dữ liệu JSON
header('Content-Type: application/json');
echo json_encode($merged);


if (count($mergedArray) <= 0) { return; }

$placeholders = [];
$params = [];
$types = '';

foreach ($mergedArray as $item) {
    $placeholders[] = "(?, ?, ?, ?, ?, ?, UNIX_TIMESTAMP())";
    $params[] = $item['id'];
    $params[] = $item['loss'];
    $params[] = $item['laingays'];
    $params[] = $item['tonglais'];
    $params[] = $item['ip'] ?? '';
    $params[] = $item['gmail'] ?? '';

    $types .= 'idddss';
}

$sql = "INSERT INTO data_log (id, loss, laingays, tonglais, ip, gmail, updated_unix) VALUES "
         . implode(",", $placeholders)
         . " ON DUPLICATE KEY UPDATE
             loss = VALUES(loss),
             laingays = VALUES(laingays),
             tonglais = VALUES(tonglais),
             ip = VALUES(ip),
             updated_unix = UNIX_TIMESTAMP()";


$stmt = $mysqli->prepare($sql);
if (!$stmt) {
    echo json_encode(["status"=>"error","message"=>"Prepare failed: ".$mysqli->error]);
    exit();
}

$refs = [];
foreach ($params as $key => $value) $refs[$key] = &$params[$key];
array_unshift($refs, $types);
call_user_func_array([$stmt, 'bind_param'], $refs);

if (!$stmt->execute()) {
    echo json_encode(["status"=>"error","message"=>"Execute failed: ".$stmt->error]);
    exit();
}

$stmt->close();
$mysqli->close();



// =========================
//  ĐÓNG KẾT NỐI
// =========================
$stmt->close();
$mysqli->close();

// =========================
//  TRẢ KẾT QUẢ
// =========================
echo json_encode([
    "status" => "success",
    "message" => "Đã merge và lưu dữ liệu từ Firebase",
    "count" => count($mergedArray),
    "data" => $mergedArray
], JSON_PRETTY_PRINT);