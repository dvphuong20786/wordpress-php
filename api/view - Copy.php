<?php
$mysqli = new mysqli("localhost", "root", "", "thiennhanweb");
if ($mysqli->connect_error) {
    die("Kết nối thất bại: " . $mysqli->connect_error);
}

$result = $mysqli->query("SELECT * FROM data_log ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách dữ liệu JSON</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f7f7f7; }
        table { border-collapse: collapse; width: 100%; background: #fff; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        h1 { text-align: center; color: #333; }
    </style>
    <script>
        // Reload trang mỗi 1 giây
        setInterval(function() {
            //location.reload();
        }, 1000); // 1000ms = 1 giây
    </script>
</head>
<body>
    <h1>Danh sách dữ liệu JSON</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Loss</th>
                <th>Lai Ngay</th>
                <th>Tong Lai</th>
                <th>IP</th>
                <th>Email</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".htmlspecialchars($row['id'])."</td>";
                    echo "<td>".htmlspecialchars($row['loss'])."</td>";
                    echo "<td>".htmlspecialchars($row['laingays'])."</td>";
                    echo "<td>".htmlspecialchars($row['tonglais'])."</td>";
                    echo "<td>".htmlspecialchars($row['ip'])."</td>";
                    echo "<td>".htmlspecialchars($row['gmail'])."</td>";
                    echo "<td>".htmlspecialchars($row['created_at'])."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Chưa có dữ liệu</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
<?php $mysqli->close(); ?>
