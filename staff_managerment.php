<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop</title>
    <link rel="shortcut icon" href="./assets/images/diamond3.png" type="image/x-icon">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/CSS/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/CSS/font-awesome.css">

    <link rel="stylesheet" href="assets/CSS/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/CSS/owl-carousel.css">

    <link rel="stylesheet" href="assets/CSS/lightbox.css">
    <title>Quan ly trang suc</title>
    <link rel="shortcut icon" href="./views/img/diamond3.png" type="image/x-icon">
</head>
<body>
<div class="container-fluid">
    <div class="container-fluid mar-top">
    <div class="container-fluid text-center">
        <h3>DANH SÁCH NHÂN VIÊN</h3>
    </div>
        <?php
            include('./assets/controller/tmdt.php');
            $p = new tmdt();
        ?>
        <form action="">
            <table class="table-cart">
                <thead class="text-center">
                    <tr>
                        <th width="50px">Mã NV</th>
                        <th>Tên nhân viên</th>
                        <th>Giới tính</th>
                        <th>Ngày sinh</th>
                        <th>Địa chỉ</th>
                        <th>Điện thoại</th>
                        <th>Ghi chú</th>
                        <th>Xóa</th>
                        <th>Cập nhật</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                        $p->dsNhanVien('SELECT * FROM `nhanvien`');
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</div>
</body>
