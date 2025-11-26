<?php
// get_data.php
$sources = [
    "dvphuong.dev@gmail.com",
    "dv.francois207.4@gmail.com",
    "dv.francois207.5@gmail.com",
    "khanhln935@gmail.com",
    "tthnguyen18@gmail.com"
];


$map = [];

foreach ($sources as $source) {
    // Replace dấu . thành _
    $source = str_replace('.', '_', $source);
    
    $json = @file_get_contents("https://phuongdv-theodoi-default-rtdb.firebaseio.com/data/{$source}.json");
    if ($json === false) continue;
    $data = json_decode($json, true);
    if (!is_array($data)) continue;

    foreach ($data as $item) {
        $map[$item['id']] = $item; // merge theo id
    }
}

$merged = array_values($map);



// =========================
//  KẾT NỐI DATABASE
// =========================
// $mysqli = new mysqli("localhost", "root", "", "thiennhanweb");
$mysqli = new mysqli("sql103.byetcluster.com", "40475278_3", "QS1p98(4@j", "if0_40475278_wp646");

if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => "Kết nối database thất bại: " . $mysqli->connect_error
    ]);
    exit();
}


// Trả dữ liệu JSON
header('Content-Type: application/json');
echo json_encode($merged);
?>
