<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>TÀI KHOẢN</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 0px; margin: 0px; background: #f7f7f7; }
        table { border-collapse: collapse; width: 100%; background: #fff; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        h1 { text-align: center; color: #333; }
    </style>
</head>
<body>
    <!-- <h1>Danh sách dữ liệu JSON</h1> -->
    <table id="data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Loss</th>
                <th>Lai Ngay</th>
                <th>Tong Lai</th>
                <th>IP</th>
                <th>Email</th>
                <!-- <th>Created At</th> -->
            </tr>
        </thead>
        <tbody>
            <!-- Dữ liệu sẽ đổ ở đây -->
        </tbody>
    </table>

    <script>
        async function fetchData() {
            try {
                const response = await fetch('get_data.php');
                const data = await response.json();

                const tbody = document.querySelector('#data-table tbody');
                tbody.innerHTML = ''; // xóa dữ liệu cũ

                if (data.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="7">Chưa có dữ liệu</td></tr>';
                    return;
                }

                data.forEach((item, index) => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${item.id}</td>
                        <td>${item.loss}</td>
                        <td>${item.laingays}</td>
                        <td>${item.tonglais}</td>
                        <td>${item.ip ?? ''}</td>
                        <td>${item.gmail}</td>
                        
                    `;
                    //<td>${item.created_at}</td>
                    tbody.appendChild(tr);
                });
				console.log('1')
            } catch (error) {
                console.error('Lỗi khi fetch dữ liệu:', error);
            }
        }

        // Lấy dữ liệu ngay khi load trang
        fetchData();

        // Lấy lại dữ liệu mỗi 1 giây
        setInterval(fetchData, 1000);
    </script>
</body>
</html>
