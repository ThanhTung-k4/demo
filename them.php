<?php
require_once('./connectdp.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $ngaysinh = $_POST['ngaysinh'];
    $quequan = $_POST['quequan'];

    $kq = $con->query("Select * from sinh_vien_moi where id='$id'");
    if ($kq->num_rows > 0) {
        echo '<script>alert("Không được trùng id")</script>';
    } else {
        $lenhsql = "insert into sinh_vien_moi (id,name,ngaysinh,quequan) values ('$id','$name','$ngaysinh','$quequan')";
        try {
            $con->query($lenhsql);
            echo '<script>alert("Thêm thành công!")</script>';
        } catch (Exception $e) {
            $e->getMessage();
        }
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
    <form style="margin-top:10px" method="post">
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
                </ul>
            </div>
            <div class="Text2">
                <div class="Phude">
                    <h2 class="font-monospace"><a href="">Thêm thông tin sinh viên</a></h2>
                </div>
                <table class="table">
                    <tr>
                        <td>ID</td>
                        <td>
                            <input type="text" placeholder="ID" name="id">
                        </td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" placeholder="Name" name="name">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Date
                        </td>
                        <td>
                            <input type="date" placeholder="Date" name="ngaysinh">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Address
                        </td>
                        <td>
                            <input type="text" placeholder="Adress" name="quequan">
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary btn-sm">Thêm</button>
            </div>
        </div>
    </form>
    <div class="End">

    </div>
</body>

</html>