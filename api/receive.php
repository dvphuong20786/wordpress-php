<?php
header('Content-Type: application/json');

$source_acc = "phuongdv";
$source_url = "https://phuongdv-theodoi-default-rtdb.firebaseio.com/phuongdv.json";
//"https://phuongdv-theodoi-default-rtdb.firebaseio.com"

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

$mergedArray = array_values($result);

// =========================
//  KẾT NỐI DATABASE
// =========================
//$mysqli = new mysqli("sql103.byetcluster.com", "40475278_3", "QS1p98(4@j", "if0_40475278_wp646");
//$mysqli = new mysqli("sql103.infinityfree.com", "if0_40475278", "8P0ppJtY4JHcfEO", "if0_40475278_wp646");
$mysqli = new mysqli("sql100.infinityfree.com", "if0_40536212", "8YhjUNOd5uz1I", "if0_40536212_wp596");

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
        
        // Firebase đã gửi unix timestamp sẵn
    	$firebase_unix = intval($item['date']);  // ví dụ 1764327709
        
        $values[] = "(?, ?, ?, ?, ?, ?, ?, ?, UNIX_TIMESTAMP())"; 
        $params[] = $item['id'];        // i
        $params[] = $item['loss'];      // d
        $params[] = $item['laingays'];  // d
        $params[] = $item['tonglais'];  // d
        $params[] = $item['ip'] ?? '';  // s
        $params[] = $item['gmail'];     // s
        $params[] = $source_acc;        // s 
    	$params[] = $firebase_unix;     // s hoặc i
    }

    $sql = "INSERT INTO data_log (id, loss, laingays, tonglais, ip, gmail, source, VPS_unix, updated_unix) VALUES "
         . implode(",", $values)
         . " ON DUPLICATE KEY UPDATE
             loss         = VALUES(loss),
             laingays     = VALUES(laingays),
             tonglais     = VALUES(tonglais),
             ip           = VALUES(ip),
             source       = VALUES(source),
    		 VPS_unix     = VALUES(VPS_unix),
             updated_unix = UNIX_TIMESTAMP()";

    $stmt = $mysqli->prepare($sql);
    if ($stmt) {
        $types = str_repeat("idddssss", count($mergedArray));
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
