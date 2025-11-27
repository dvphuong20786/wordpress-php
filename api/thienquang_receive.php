<?php
header('Content-Type: application/json');

$source_acc = "thienquang";
$source_url = "https://thienquang-theodoi-default-rtdb.firebaseio.com";
//"https://phuongdv-theodoi-default-rtdb.firebaseio.com"
//"https://thienquang-theodoi-default-rtdb.firebaseio.com"
$sources = [
    "dvphuong.dev@gmail.com",
    "dv.francois207.4@gmail.com",
    "dv.francois207.5@gmail.com",
    "khanhln935@gmail.com",
    "tthnguyen18@gmail.com"
];

$map = [];

foreach ($sources as $source) {
    $sourceKey = str_replace('.', '_', $source);
    $json = @file_get_contents("{$source_url}/{$source_acc}/{$sourceKey}.json"); 
    if ($json === false) continue;
    $data = json_decode($json, true);
    if (!is_array($data)) continue;

    foreach ($data as $item) {
        $map[$item['id']] = $item; // merge theo id
    }
}

$mergedArray = array_values($map);

// =========================
//  KẾT NỐI DATABASE
// =========================
//$mysqli = new mysqli("sql103.byetcluster.com", "40475278_3", "QS1p98(4@j", "if0_40475278_wp646");
$mysqli = new mysqli("sql103.infinityfree.com", "if0_40475278", "8P0ppJtY4JHcfEO", "if0_40475278_wp646");
if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => "Kết nối database thất bại: " . $mysqli->connect_error
    ]);
    exit();
}

// =========================
//  CHUẨN BỊ STATEMENT
// =========================
if (!empty($mergedArray)) {
    $values = [];
    $params = [];

    foreach ($mergedArray as $item) {
        $values[] = "(?, ?, ?, ?, ?, ?, ?, UNIX_TIMESTAMP())"; 
        $params[] = $item['id'];        // i
        $params[] = $item['loss'];      // d
        $params[] = $item['laingays'];  // d
        $params[] = $item['tonglais'];  // d
        $params[] = $item['ip'] ?? '';  // s
        $params[] = $item['gmail'];     // s
        $params[] = $source_acc;        // s
    }

    $sql = "INSERT INTO data_log (id, loss, laingays, tonglais, ip, gmail, source, updated_unix) VALUES "
         . implode(",", $values)
         . " ON DUPLICATE KEY UPDATE
             loss = VALUES(loss),
             laingays = VALUES(laingays),
             tonglais = VALUES(tonglais),  
             ip = VALUES(ip),
             source = VALUES(source),
             updated_unix = UNIX_TIMESTAMP()";

    $stmt = $mysqli->prepare($sql);
    if ($stmt) {
        $types = str_repeat("idddsss", count($mergedArray));
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $stmt->close();
    }
}

// =========================
//  ĐÓNG KẾT NỐI & TRẢ JSON
// =========================
$mysqli->close();

echo json_encode([
    "status" => "success",
    "message" => "Đã lưu dữ liệu JSON",
    "received" => $mergedArray
], JSON_PRETTY_PRINT);
