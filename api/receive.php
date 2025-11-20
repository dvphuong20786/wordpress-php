<?php
// =========================
//  BẬT CORS (cho phép domain khác gửi JSON)
// =========================
header("Access-Control-Allow-Origin: https://crm.ecmarkets.com");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");

// Nếu trình duyệt gửi OPTIONS trước (CORS preflight)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// =========================
//  NHẬN JSON TỪ BODY
// =========================
$json = file_get_contents("php://input");
$dataArray = json_decode($json, true); // mảng các object

// =========================
//  GHI LOG FILE
// =========================
$logFile = __DIR__ . "/log.txt"; 
file_put_contents($logFile, date("Y-m-d H:i:s") . " - " . $json . "\n", FILE_APPEND);

// =========================
//  KẾT NỐI DATABASE
// =========================
$mysqli = new mysqli("localhost", "root", "", "thiennhanweb");
if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => "Kết nối database thất bại: " . $mysqli->connect_error
    ]);
    exit();
}

// =========================
//  CHUẨN BỊ STATEMENT (INSERT hoặc UPDATE nếu trùng ID)
// =========================
$stmt = $mysqli->prepare("
    INSERT INTO data_log (id, loss, laingays, tonglais, ip, gmail) 
    VALUES (?, ?, ?, ?, ?, ?)
    ON DUPLICATE KEY UPDATE
        loss = VALUES(loss),
        laingays = VALUES(laingays),
        tonglais = VALUES(tonglais),
        ip = VALUES(ip),
        gmail = VALUES(gmail)
");

// =========================
//  LẶP TỪNG BẢN GHI TRONG MẢNG JSON
// =========================
foreach ($dataArray as $item) {
    $id = $item['id'];
    $loss = $item['loss'];
    $laingays = $item['laingays'];
    $tonglais = $item['tonglais'];
    $ip = $item['ip'];
    $gmail = $item['gmail'];

    $stmt->bind_param("idddss", $id, $loss, $laingays, $tonglais, $ip, $gmail);
    $stmt->execute();
}

// =========================
//  ĐÓNG KẾT NỐI
// =========================
$stmt->close();
$mysqli->close();

// =========================
//  TRẢ LẠI PHẢN HỒI JSON
// =========================
echo json_encode([
    "status" => "success",
    "message" => "Đã lưu dữ liệu JSON vào database (insert hoặc update)",
    "you_sent" => $dataArray
], JSON_PRETTY_PRINT);
