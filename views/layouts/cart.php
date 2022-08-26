<?php
include('./assets/controller/tmdt.php');
$p = new tmdt();

//Xoa 1 san pham
if(isset($_GET['delid']) && ($_GET['delid']>= 0)) {
    array_splice($_SESSION['giohang'], $_GET['delid'],1);
}

//Set gio hang
if(!isset($_SESSION['giohang'])){
    $_SESSION['giohang'] = array();
}

//Lay du lieu tu Form
if(isset($_POST['Buy']) && ($_POST['Buy'])){
    $TenSP = $_POST ["TenSP"];
    $DonGia = $_POST ["Dongia"];
    $Img = $_POST["Img"];
    $SoLuong = $_POST["Soluong"];
    $ThanhTien = $SoLuong * $DonGia;

    //Kiem tra xem gio hang da co san pham 
    $fl=0;
    for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
        if ($_SESSION['giohang'][$i][0] == $TenSP) {
            $fl = 1;
            //Them so luong moi
            $SoLuongNew = $SoLuong + $_SESSION['giohang'][$i][3];
            $_SESSION['giohang'][$i][3] = $SoLuongNew;
            //Them gia moi
            $GiaNew = $DonGia + $_SESSION['giohang'][$i][2];
            $_SESSION['giohang'][$i][2] = $GiaNew;
            //Them thanh tien moi
            $ThanhTienNew = $ThanhTien + $_SESSION['giohang'][$i][4];
            $_SESSION['giohang'][$i][4] = $ThanhTien;
        }
    }

    if($fl == 0) {
        $gh = array($TenSP, $Img, $DonGia, $SoLuong, $ThanhTien);
        $_SESSION['giohang'][] =$gh;
    }
}


function showGioHang(){
$tongtien = 0;
if(isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))) {
    for($i=0; $i < sizeof($_SESSION['giohang']); $i++) {
        $tongtien += $_SESSION['giohang'][$i][4];
        echo'
    <tr>
        <td>'.($i+1).'</td>
        <td>'.$_SESSION['giohang'][$i][0].'</td>
        <td><img width="100px" height="100px" src="assets/images/'.$_SESSION['giohang'][$i][1].'" alt=""></td>
        <td>'.$_SESSION['giohang'][$i][2].'.000/vnđ</td>
        <td>'.$_SESSION['giohang'][$i][3].'</td>
        <td>'.$_SESSION['giohang'][$i][4].'.000</td>
        <td><button class="btn btn-danger"><a class="none_decor" href="index.php?page=cart&delid='.$i.'">Xóa</a></button></td>
    </tr>';
    }
    echo'
    <tr>
        <td colspan="6" style="text-align: left; background-color:grey; color: white">Tổng thành tiền</td>
        <td>'.$tongtien.'.000 vnđ</td>
    </tr>'
    ;
}
}
?>


<div class="container mar-top">
<div class="containner text-center">
    <h3>GIỎ HÀNG CỦA BẠN</h3>
</div>
<table class="table table-light table-striped">
    <thead class="text-center"  style="background-color:grey; color: white">
        <tr>
            <th width="50px">STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody class="text-center height-150px">
        <?php
            showGioHang();
        ?>
        <tr>
            <td colspan="6"><a style="float:left;" href="index.php?page=payment" class="btn-all none_decor">Thanh toán</a><td>
        </tr>
    </tbody>
</table>
</div>





