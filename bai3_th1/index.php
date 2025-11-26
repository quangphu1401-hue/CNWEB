<?php
// Tên file CSV cần đọc
$filename = "65HTTT_Danh_sach_diem_danh.csv";
$students = [];

// Kiểm tra file có tồn tại không
if (file_exists($filename)) {
    // Mở file ở chế độ đọc ('r')
    if (($handle = fopen($filename, "r")) !== FALSE) {
        // Đọc dòng đầu tiên để lấy tên cột (Header) -> Bỏ qua dòng này nếu không muốn hiển thị header trong body
        $headers = fgetcsv($handle, 1000, ","); 

        // Đọc từng dòng tiếp theo cho đến hết file
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $students[] = $data; // Lưu từng dòng vào mảng students
        }
        fclose($handle); // Đóng file sau khi đọc xong
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">Danh sách Sinh viên </h1>
        
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Họ đệm</th>
                            <th>Tên</th>
                            <th>Lớp</th>
                            <th>Email</th>
                            <th>Khóa học</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Duyệt qua mảng sinh viên để in ra từng dòng
                        if (!empty($students)) {
                            foreach ($students as $student) {
                                echo "<tr>";
                                echo "<td>" . $student[0] . "</td>"; // Cột username
                                echo "<td>" . $student[1] . "</td>"; // Cột password
                                echo "<td>" . $student[2] . "</td>"; // Cột lastname
                                echo "<td>" . $student[3] . "</td>"; // Cột firstname
                                echo "<td>" . $student[4] . "</td>"; // Cột city
                                echo "<td>" . $student[5] . "</td>"; // Cột email
                                echo "<td>" . $student[6] . "</td>"; // Cột course1
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>Không tìm thấy dữ liệu file CSV!</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="alert alert-info mt-3">
        </div>
    </div>
</body>
</html>