<?php
include __DIR__ . '/../../config/database.php';


if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $sql = "DELETE FROM NHANVIEN WHERE Ma_NV = '$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: /kiemtrab7/personnel-management-system/public/index.php");
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>
