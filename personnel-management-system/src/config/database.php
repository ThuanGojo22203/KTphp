<?php
$servername = "localhost";
$username = "root"; // Tài khoản mặc định của XAMPP
$password = ""; // XAMPP không có mật khẩu mặc định
$database = "ql_nhansu"; // Tên CSDL của bạn

// Kết nối MySQL
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
