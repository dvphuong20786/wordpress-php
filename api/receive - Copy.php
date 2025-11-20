<?php
// =========================
//  BẬT CORS (cho phép domain khác gửi JSON)
// =========================
//header("Access-Control-Allow-Origin: *");  // hoặc domain cụ thể
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
$data = json_decode($json, true);

// =========================
//  GHI LOG (để bạn xem request có tới không)
// =========================
$logFile = __DIR__ . "/log.txt"; 
file_put_contents($logFile, date("Y-m-d H:i:s") . " - " . $json . "\n", FILE_APPEND);

// =========================
//  TRẢ LẠI PHẢN HỒI JSON
// =========================
echo json_encode([
    "status" => "success",
    "message" => "Đã nhận JSON",
    "you_sent" => $data
], JSON_PRETTY_PRINT);
