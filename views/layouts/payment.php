<?php
    session_start();
    $slsp = 0;
if(isset($_SESSION['giohang'])) $slsp = sizeof($_SESSION['giohang']);
?>

<?php
    include('./assets/controller/tmdt.php');
    $p = new tmdt();

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

    
    function showTTGioHang(){
        $tongtien = 0;
        if(isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))) {
            for($i=0; $i < sizeof($_SESSION['giohang']); $i++) {
                $tongtien += $_SESSION['giohang'][$i][4];
                echo'
            <tr class="text-center height-150px">
                <td>'.($i+1).'</td>
                <td>'.$_SESSION['giohang'][$i][0].'</td>
                <td>'.$_SESSION['giohang'][$i][3].'</td>
                <td>'.$_SESSION['giohang'][$i][4].'.000</td>
            </tr>';
            }
            echo'
            <tr>
                <td colspan="3" style="text-align: left">Tổng thành tiền</td>
                <td>'.$tongtien.'.000 vnđ</td>
            </tr>'
            ;
        }
}
?>

<div class="container-fluid">
    <div class="container bg-light mar-top">
        <h3 class="text-center">THÔNG TIN HÓA ĐƠN</h3>
        <form action="donhang.php" method="POST">
            <div class="container">
                <div class="row">
                <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <h5>Thông tin khách hàng</h5>
                        <div class="row form-group" id="div-pay">
                            <div class="col-lg-6 form-group">
                                <label>Họ tên</label>
                                <input type="text" name="hoten">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Số điện thoại</label>
                                <input type="text" name="sdt">
                            </div>
                            <div class="col-lg-12 form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="diachi">
                            </div>
                            <div class="col-lg-12 form-group">
                                <label>Ghi chú thêm</label>
                                <input type="text" name="ghichu">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>


            <div class="container form-inline font_all">
                <h5>Hình thức thanh toán: </h5>
                <div class="form-inline mar-left-15px">
                    <div class="form-inline">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="">
                        <label class="form-check-label" for="flexRadioDefault1"> Tiền mặt</label>
                    </div>
                    <div class="form-inline mar-left-15px">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="" checked>
                        <label class="form-check-label" for="flexRadioDefault2"> Chuyển khoản</label>
                        <br><br>
                    </div>
                </div>
            </div>

            <div class="container">
                <h5>Đơn hàng ( <?php echo ($slsp);?> sản phẩm)</h5>
                <table class="table table-light table-striped">
                    <thead class="text-center">
                        <tr>
                            <th width="50px">STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                            showTTGioHang();
                        ?>
                        <tr>
                            <td colspan="3"><button style="float:left" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Đặt hàng</button><td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thông báo</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <h6>Đặt hàng thàng công, cảm ơn bạn đã đặt hàng.</h6>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a  href="index.php" class="btn btn-danger" data-bs-dismiss="modal">Đóng</a>
      </div>

    </div>
  </div>
</div>