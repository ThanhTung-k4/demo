<?php
require_once('./connectdp.php');
$kq = $con->query('Select * from sinh_vien_moi');
$dulieu = $kq->fetch_all();
?>
<?php
require_once('./connectdp.php');
$sinhvienQuery = $con->query("select * from sinh_vien_moi");

if (isset($_POST['btnTimkiem']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    try {
        $sinhvienQuery = $con->query("select * from sinh_vien_moi where id like '%$id%' and name like '%$name%'");
    } catch (Exception $e) {
        // echo $e->getMessage();
        echo '<script>alert("ERROR")</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- HEADER -->
    <div class="Header">
        <div>
            <img src="./img/z5416830485429_c43a3a82a27987de4725eda90c6c7c92.jpg" alt="">
        </div>
        <div>
            <h1 class="font-monospace">Phần mềm quản lý sinh viên UTT</h1>
        </div>
    </div>
    <!-- MENU -->
    <div class="Menu">
        <div class="Text1">
            <ul>
                <li><a href="home.php">Trang chủ</a></li>
                <li><a href="them.php">Thêm sinh viên</a></li>
            </ul>
        </div>
        <div class="Text2">
            <!-- form tim kiem -->
            <form method="post" style="width: 300px">
                <input placeholder="ID" name="id" class="form-control mb-2">
                <input placeholder="Tên" name="name" class="form-control mb-2">
                <button name="btnTimkiem" class="btn btn-primary btn-sm">Tim kiem</button>
            </form>
            <div class="Phude">
                <h2 class="font-monospace"><a href="">Thông tin sinh viên</a></h2>
            </div>
            <table class="table">
                <tr class="table-danger">
                    <td>ID</td>
                    <td>Name</td>
                    <td>Ngày sinh</td>
                    <td>Quê quán</td>
                    <td>Tùy chọn</td>
                    <td></td>
                </tr>
                <?php
                if ($sinhvienQuery->num_rows > 0) {
                    while ($sinhvien = $sinhvienQuery->fetch_assoc()) {
                        echo '<tr>
                        <th>' . $sinhvien['id'] . '</th>
                        <th>' . $sinhvien['name'] . '</th>
                        <th>' . $sinhvien['ngaysinh'] . '</th>
                        <th>' . $sinhvien['quequan'] . '</th>
                        <th ><a class="btn btn-warning" href="./sua.php?id=' . $sinhvien['id'] . '">Sửa</th>
                        <th ><a class="btn btn-danger" href="./xoa.php?id=' . $sinhvien['id'] . '">Xóa</a></th>
                        </tr>';
                    }
                }
                ?>
        </div>
    </div>

</body>

</html>