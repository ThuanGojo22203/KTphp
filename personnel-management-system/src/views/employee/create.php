<?php
include __DIR__ . '/../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Ma_NV = $conn->real_escape_string($_POST['Ma_NV']);
    $Ten_NV = $conn->real_escape_string($_POST['Ten_NV']);
    $Phai = $conn->real_escape_string($_POST['Phai']);
    $Noi_Sinh = $conn->real_escape_string($_POST['Noi_Sinh']);
    $Ma_Phong = $conn->real_escape_string($_POST['Ma_Phong']);
    $Luong = $conn->real_escape_string($_POST['Luong']);

    $sql = "INSERT INTO NHANVIEN (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) 
            VALUES ('$Ma_NV', '$Ten_NV', '$Phai', '$Noi_Sinh', '$Ma_Phong', '$Luong')";

    if ($conn->query($sql) === TRUE) {
        header("Location: /kiemtrab7/personnel-management-system/public/index.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Lỗi: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhân Viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4">Thêm Nhân Viên</h2>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Mã NV:</label>
                <input type="text" name="Ma_NV" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tên NV:</label>
                <input type="text" name="Ten_NV" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Giới tính:</label>
                <select name="Phai" class="form-select">
                    <option value="NAM">Nam</option>
                    <option value="NU">Nữ</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nơi Sinh:</label>
                <input type="text" name="Noi_Sinh" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Phòng Ban:</label>
                <input type="text" name="Ma_Phong" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Lương:</label>
                <input type="number" name="Luong" class="form-control">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success w-100">Thêm Nhân Viên</button>
                <a href="/kiemtrab7/personnel-management-system/public/index.php" class="btn btn-secondary mt-2 w-100">Quay lại</a>
            </div>
        </form>
    </div>

</body>
</html>
