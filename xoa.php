<?php
require_once('./connectdp.php');
try {
    $kq = $con->query('delete from sinh_vien_moi where id=' . $_GET['id']);
    header('location: ./home.php');
} catch (Exception $e) {
    echo '<script>alert("Xóa thành công.")</script>';
}
;