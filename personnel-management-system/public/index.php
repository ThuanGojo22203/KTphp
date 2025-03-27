<?php
include __DIR__ . '/../src/config/database.php'; // Kết nối CSDL

$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$sql = "SELECT NHANVIEN.*, PHONGBAN.Ten_Phong 
        FROM NHANVIEN 
        JOIN PHONGBAN ON NHANVIEN.Ma_Phong = PHONGBAN.Ma_Phong 
        LIMIT $start, $limit";
$result = $conn->query($sql);

$total_sql = "SELECT COUNT(*) FROM NHANVIEN";
$total_result = $conn->query($total_sql);
$total_rows = $total_result->fetch_array()[0];
$total_pages = ceil($total_rows / $limit);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Nhân viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: #f8f9fa;
        }
        .card-custom {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .table th {
            background: #007bff;
            color: white;
            text-align: center;
        }
        .btn-action {
            border-radius: 50px;
            padding: 5px 15px;
        }
        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
        .pagination .page-link {
            color: #007bff;
        }
        .employee-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body class="container mt-5">

    <div class="card card-custom">
        <h2 class="text-center mb-4">Quản lý Nhân viên</h2>

        <div class="text-end">
            <a href="/kiemtrab7/personnel-management-system/src/views/employee/create.php" class="btn btn-success btn-action mb-3">➕ Thêm nhân viên</a>
        </div>

        <table class="table table-bordered table-hover text-center align-middle">
            <thead>
                <tr>
                    <th>Mã NV</th>
                    <th>Tên Nhân viên</th>
                    <th>Ảnh đại diện</th>
                    <th>Nơi sinh</th>
                    <th>Phòng ban</th>
                    <th>Lương</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><strong><?php echo $row['Ma_NV']; ?></strong></td>
                        <td><?php echo $row['Ten_NV']; ?></td>
                        <td>
                            <img src="<?php echo ($row['Phai'] == 'NU') 
                                ? '/kiemtrab7/personnel-management-system/public/assets/images/woman.jpg' 
                                : '/kiemtrab7/personnel-management-system/public/assets/images/man.jpg'; ?>" 
                                class="employee-avatar">
                        </td>
                        <td><?php echo $row['Noi_Sinh']; ?></td>
                        <td><?php echo $row['Ten_Phong']; ?></td>
                        <td><strong><?php echo number_format($row['Luong']); ?> VND</strong></td>
                        <td>
                            <a href="/kiemtrab7/personnel-management-system/src/views/employee/edit.php?id=<?php echo $row['Ma_NV']; ?>" class="btn btn-primary btn-action">✏️ Sửa</a>
                            <a href="/kiemtrab7/personnel-management-system/src/views/employee/delete.php?id=<?php echo $row['Ma_NV']; ?>" 
                               class="btn btn-danger btn-action"
                               onclick="return confirm('Bạn có chắc muốn xóa?');">🗑️ Xóa</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <nav class="d-flex justify-content-center">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                        <a href="index.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>  

    </div>

</body>
</html>
