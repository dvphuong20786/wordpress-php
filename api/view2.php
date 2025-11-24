<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="view.css">
    <title>TÀI KHOẢN</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 0px; margin: 0px; background: #f7f7f7; }
        table { border-collapse: collapse; width: 100%; background: #fff; }
        th, td { border: 1px solid #ccc; padding: 4px 4px; text-align: center; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        h1 { text-align: center; color: #333; }
        .itemdautien { font-size: 26px; font-weight: 500; 
          animation: sayhi3 1s infinite; flex: 1;
          letter-spacing: -1px; color: red;
        }
        .itemdautien2 { font-size: 22px; font-weight: 500; 
          animation: sayhi3 1s infinite;  flex: 1;
          letter-spacing: -1px; color: red;
        }
        .itemdautien3 { font-size: 18px; font-weight: 500; 
          animation: sayhi3 1s infinite; flex: 1;
          letter-spacing: -1px; color: red;
        }
        .itemdautien4 { font-size: 18px; font-weight: 500;  flex: 1;
          letter-spacing: -1px; color: red;
        } 
        thead th {
          position: sticky;
          top: 0;           /* luôn dính ở trên */ 
          z-index: 10;      /* ưu tiên hiển thị trên các ô khác */
        }
        .colOff{background:red; color:white; font-weight:bold;}
        .colOn{background:#2bbe00; color:white; font-weight:bold;}
        .colOfftime{ color:red; letter-spacing: -1px; font-size: 14px; }
        .laingay { color: #1c7700ff; font-weight:bold; }
    </style>
</head>
<body>

    <div class="i-phone-13-14-5" id="i-phone-13-14-5" >
    <div class="background-image">
      <img class="image backgroundImage3" src="img/bg.png" />
      <img class="image backgroundImage3" src="img/bg.png" />
      <img class="image backgroundImage3" src="img/bg.png" />
      <!-- <img class="image backgroundImage3" src="img/bg.png" /> -->
    </div>
    <div class="frame-1171276544">
      <div class="frame-1171276546">
        <div class="top-bar">
          <div class="frame-45316" id="closePopup">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
              <path d="M16.0033 2.66016C8.65659 2.66016 2.66992 8.64682 2.66992 15.9935C2.66992 23.3402 8.65659 29.3268 16.0033 29.3268C23.3499 29.3268 29.3366 23.3402 29.3366 15.9935C29.3366 8.64682 23.3499 2.66016 16.0033 2.66016ZM20.4833 19.0602C20.8699 19.4468 20.8699 20.0868 20.4833 20.4735C20.2833 20.6735 20.0299 20.7668 19.7766 20.7668C19.5233 20.7668 19.2699 20.6735 19.0699 20.4735L16.0033 17.4068L12.9366 20.4735C12.7366 20.6735 12.4833 20.7668 12.2299 20.7668C11.9766 20.7668 11.7233 20.6735 11.5233 20.4735C11.1366 20.0868 11.1366 19.4468 11.5233 19.0602L14.5899 15.9935L11.5233 12.9268C11.1366 12.5402 11.1366 11.9002 11.5233 11.5135C11.9099 11.1268 12.5499 11.1268 12.9366 11.5135L16.0033 14.5802L19.0699 11.5135C19.4566 11.1268 20.0966 11.1268 20.4833 11.5135C20.8699 11.9002 20.8699 12.5402 20.4833 12.9268L17.4166 15.9935L20.4833 19.0602Z" fill="#DAA519"/>
            </svg>
          </div>
          <div class="album-vol-2"></div>
          <div class="frame-1171276543">
            <div class="registerAccount"></div>
 
          </div>
        </div> 
        <div class="frame-1171276107">
          <div class="frame-1171276542" id="danhsachtaikhoan">
             
          </div>
        </div>
      </div>
       
    </div>
</div>


    <!-- <h1>Danh sách dữ liệu JSON</h1> -->
    <table id="data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>account</th>
                <th>Loss</th>
                <th>Lãi ngày</th>
                <th>Tổng</th>
                <th>VPS</th>
                <th>Email</th>
                <th>S</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dữ liệu sẽ đổ ở đây -->
        </tbody>
    </table>

    <script>

        var btn = document.getElementById("closePopup");
        btn.addEventListener("click", function() {
            var phone = document.getElementById("i-phone-13-14-5");
            if (phone) {
                phone.style.display = "none"; // ẩn phần tử
            }
        });

        async function fetchData() {
            try {
                const response = await fetch('get_data.php');
                const data = await response.json();

                const danhsachtaikhoan = document.getElementById('danhsachtaikhoan');
                danhsachtaikhoan.innerHTML = ''; // xóa dữ liệu cũ
                
                const tbody = document.querySelector('#data-table tbody');
                tbody.innerHTML = ''; // xóa dữ liệu cũ

                if (data.length === 0) {
                    danhsachtaikhoan.innerHTML = 'Chưa có dữ liệu';
                    return;
                }

                data.forEach((item, index) => {
                     
                    let element =`<div class="glass-material" id='${item.id}'>
                                    <div class="music">
                                    <div class="frame-1171276105">
                                      <img
                                        class="z-2416572476752-a-594-f-9852-ae-78-b-64-c-12-c-277-bba-6-a-3-c-36 avata1 avata_${item.id}"
                                        src="img/avata2.png" title='Reload lại tài khoản' acc='${item.id}'
                                      />
                                      <div class="frame-3 data">
                                        <div class="c-u-o">${item.id}</div>
                                        <div class="music">
                                          <div class="component-42">
                                            <div class="_330 _sodutong">${item.tonglais}</div>
                                            $
                                          </div>

                                          <div class="component-42 data">
                                            <div class="_330 _sodungay">${item.laingays}</div>
                                            $
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="frame-3 view2">
                                      <div class="music view2">
                                        <div class="master-ruma">${item.loss}</div>
                                        <span class='cen'>Cen</span>
                                      </div>
                                      <span class='second'>${item.ip ?? ''}</span>
                                    </div>
                                        </div>
                                        <div class="frame-1171276545">
                                          <div class="line-146"></div>
                                          <div class="frame-1171276534">
                                            
                                          </div>
                                        </div>
                                      </div>`; 
                    danhsachtaikhoan.insertAdjacentHTML('beforeend', element);

                    const tr = document.createElement('tr');
                    const firstColumn = item.seconds_passed > 60
                      ? "<td class='colOff'>OFF</td>" 
                      : `<td class='colOn'>${index + 1}</td>`;
                    const lastColumn = item.seconds_passed > 999
                      ? "<td class='colOfftime'>+999</td>" 
                      : `<td class='colOntime'>${item.seconds_passed}</td>`;
                    
                    // <td><a href="ms-rd:fulladdress=${item.ip ?? ''}">${item.ip ?? ''}</a></td>
                    tr.innerHTML = `
                        ${firstColumn}
                        <td>${item.id}</td>
                        <td class='${index == 0 ? "itemdautien ":" "} 
                        ${index == 1 ? "itemdautien2 ":" "} 
                        ${index == 2 ? "itemdautien3 ":" "}
                        ${index == 3 ? "itemdautien4 ":" "}
                        ${item.loss <= -800 ? "itemdautien4 ":" "}
                        '>${item.loss}</td>
                        <td class='laingay'>$${item.laingays}</td>
                        <td>$${item.tonglais}</td> 
                        <td>${item.ip ?? ''}</td>
                        <td>${item.gmail}</td> 
                        ${lastColumn}
                    `;
                    //
                    tbody.appendChild(tr);
 
                }); 
            } catch (error) {
                console.error('Lỗi khi fetch dữ liệu:', error);
            }
        }

        // Lấy dữ liệu ngay khi load trang
        fetchData();

        // Lấy lại dữ liệu mỗi 1 giây
        setInterval(fetchData, 1000);

        function checkWidth() {
            const width = window.innerWidth; // Lấy chiều rộng cửa sổ
            const columnToHide = document.getElementById('i-phone-13-14-5'); // Cột bạn muốn ẩn

            if (width <= 1200) {
                columnToHide.style.display = 'none'; // Ẩn cột
            } else {
                columnToHide.style.display = 'block'; // Hiện lại cột khi nhỏ hơn 900px
            }
        }

        // Chạy lần đầu
        checkWidth();
    </script>
</body>
</html>
