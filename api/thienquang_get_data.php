<?php

    //$mysqli = new mysqli("sql103.byetcluster.com", "40475278_3", "QS1p98(4@j", "if0_40475278_wp646");
$mysqli = new mysqli("sql103.infinityfree.com", "if0_40475278", "8P0ppJtY4JHcfEO", "if0_40475278_wp646");

$source_acc = "thienquang";

if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Kết nối database thất bại"]);
    exit();
}

$result = $mysqli->query("
    SELECT id, loss, laingays, tonglais, ip, gmail, 
           (UNIX_TIMESTAMP() - updated_unix) AS seconds_passed
    FROM data_log
    WHERE source = '{$source_acc}'
    ORDER BY loss ASC, gmail ASC, ip DESC, id DESC
");

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
