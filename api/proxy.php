<?php
// =========================
// CẤU HÌNH CORS
// =========================
header("Access-Control-Allow-Origin: https://crm.ecmarkets.com"); // domain frontend
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=utf-8");

// Xử lý preflight request (OPTIONS)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// =========================
// NHẬN DỮ LIỆU TỪ FRONTEND
// =========================
$inputJSON = file_get_contents('php://input'); // JSON từ frontend
$inputData = json_decode($inputJSON, true); // nếu là array/object

// =========================
// CURL GỬI ĐẾN SERVER ĐÍCH
// =========================
$targetURL = "http://theodoi.free.nf/api/receive.php";

$ch = curl_init($targetURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $inputJSON); // gửi nguyên JSON
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

// Nếu server đích SSL không hợp lệ, bật 2 dòng sau (không nên trên production có SSL hợp lệ)
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$response = curl_exec($ch);

// Kiểm tra lỗi curl
if (curl_errno($ch)) {
    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => curl_error($ch)
    ]);
    curl_close($ch);
    exit();
}

curl_close($ch);

// =========================
// TRẢ KẾT QUẢ VỀ FRONTEND
// =========================
header("Content-Type: application/json");
echo $response;
exit();
