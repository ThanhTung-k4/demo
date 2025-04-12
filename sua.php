<?php
require_once('./connectdp.php');
$id = $_GET['id'];
if (!empty($_POST)) {
    $name = $_POST['name'];
    $ngaysinh = $_POST['ngaysinh'];
    $quequan = $_POST['quequan'];
    $kq = $con->query("Update sinh_vien_moi set name ='$name',ngaysinh='$ngaysinh',quequan='$quequan' where id='$id'");
    if ($kq) {
        echo '<script>alert("Sửa thành công.")</script>';
    }
}

$sinhvienhientaiQuery = $con->query("select * from sinh_vien_moi where id = '$id'");
$sinhvien = $sinhvienhientaiQuery->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method='POST'>
        <div class="Header">
            <div>
                <img src="./img/z5416830485429_c43a3a82a27987de4725eda90c6c7c92.jpg" alt="">
            </div>
            <div>
                <h1>Phần mềm quản lý sinh viên UTT</h1>
            </div>
        </div>
        <div class="Menu">
            <div class="Text1">
                <ul>
                    <li><a href="home.php">Trang chủ</a></li>
                    <li><a href="them.php">Thêm sinh viên</a></li>
                    <li><a href="">Tìm kiếm</a></li>
                </ul>
            </div>
            <div class="Text2">
                <input type="text" name="id" value="<?php echo $sinhvien['id'] ?>">
                <input type="text" name="name" value="<?php echo $sinhvien['name'] ?>">
                <input type="text" name="ngaysinh" value="<?php echo $sinhvien['ngaysinh'] ?>">
                <input type="text" name="quequan" value="<?php echo $sinhvien['quequan'] ?>">
                <button type="submit">Sửa</button>
            </div>
        </div>
        <div class="End">
        </div>

</body>

</html>