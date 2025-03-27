<?php
session_start();
include __DIR__ . '/../src/config/database.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['role'] = $user['role'];
        header("Location: index.php");
    } else {
        echo "Sai tài khoản hoặc mật khẩu!";
    }
}
?>
<form method="POST">
    <input type="text" name="username" placeholder="Tên đăng nhập" required><br>
    <input type="password" name="password" placeholder="Mật khẩu" required><br>
    <input type="submit" value="Đăng nhập">
</form>
