<?php
include __DIR__ . '/../../config/database.php';

if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $result = $conn->query("SELECT * FROM NHANVIEN WHERE Ma_NV = '$id'");
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("<div class='alert alert-danger text-center'>Không tìm thấy nhân viên.</div>");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Ten_NV = $_POST['Ten_NV'];
    $Phai = $_POST['Phai'];
    $Noi_Sinh = $_POST['Noi_Sinh'];
    $Ma_Phong = $_POST['Ma_Phong'];
    $Luong = $_POST['Luong'];

    $sql = "UPDATE NHANVIEN SET Ten_NV='$Ten_NV', Phai='$Phai', Noi_Sinh='$Noi_Sinh', Ma_Phong='$Ma_Phong', Luong='$Luong' WHERE Ma_NV='$id'";

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
    <title>Chỉnh sửa Nhân Viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4">Chỉnh sửa Nhân Viên</h2>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Tên NV:</label>
                <input type="text" name="Ten_NV" class="form-control" value="<?php echo htmlspecialchars($row['Ten_NV']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Giới tính:</label>
                <select name="Phai" class="form-select">
                    <option value="NAM" <?php echo ($row['Phai'] == 'NAM') ? 'selected' : ''; ?>>Nam</option>
                    <option value="NU" <?php echo ($row['Phai'] == 'NU') ? 'selected' : ''; ?>>Nữ</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nơi Sinh:</label>
                <input type="text" name="Noi_Sinh" class="form-control" value="<?php echo htmlspecialchars($row['Noi_Sinh']); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Phòng Ban:</label>
                <input type="text" name="Ma_Phong" class="form-control" value="<?php echo htmlspecialchars($row['Ma_Phong']); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Lương:</label>
                <input type="number" name="Luong" class="form-control" value="<?php echo htmlspecialchars($row['Luong']); ?>">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">Cập nhật</button>
                <a href="/kiemtrab7/personnel-management-system/public/index.php" class="btn btn-secondary mt-2 w-100">Quay lại</a>
            </div>
        </form>
    </div>

</body>
</html>
