<?php
    session_start();
    if(!isset($_SESSION['donhang']) && ($_POST['Buy'])) $_SESSION['donhang']=[];
    //lấy dữ liệu từ form
    if(isset($_POST['dathang']) && ($_POST['dathang'])){
        $tenKH = $_POST['hoten'];
        $sdt = $_POST['sdt'];
        $diaChi = $_POST['diachi'];
        $donhang=[$tenKH, $sdt, $diaChi];
        $_SESSION[]=$donhang;
        var_dump($_SESSION['donhang']);
    }
?>