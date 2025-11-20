<?php
$mysqli = new mysqli("localhost", "root", "", "thiennhanweb");
if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Kết nối database thất bại"]);
    exit();
}

$result = $mysqli->query("SELECT * FROM data_log ORDER BY loss ASC, gmail ASC, ip desc, id desc");

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);

$mysqli->close();
?>
