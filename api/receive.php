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
// $logFile = __DIR__ . "/log.txt"; 
// file_put_contents($logFile, date("Y-m-d H:i:s") . " - " . $json . "\n", FILE_APPEND);

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
$values = [];
$params = [];
foreach ($dataArray as $item) {
    // Khi insert mới, updated_unix = UNIX_TIMESTAMP() → vừa là created, vừa là updated
    $values[] = "(?, ?, ?, ?, ?, ?, UNIX_TIMESTAMP())";
    $params[] = $item['id'];
    $params[] = $item['loss'];
    $params[] = $item['laingays'];
    $params[] = $item['tonglais'];
    $params[] = $item['ip'];
    $params[] = $item['gmail'];
}

$sql = "INSERT INTO data_log (id, loss, laingays, tonglais, ip, gmail, updated_unix) VALUES "
     . implode(",", $values)
     . " ON DUPLICATE KEY UPDATE
         loss = VALUES(loss),
         laingays = VALUES(laingays),
         tonglais = VALUES(tonglais), 
         updated_unix = UNIX_TIMESTAMP()"; // update timestamp khi trùng ID

$stmt = $mysqli->prepare($sql);
$types = str_repeat("idddss", count($dataArray));
$stmt->bind_param($types, ...$params);
$stmt->execute();

  

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
