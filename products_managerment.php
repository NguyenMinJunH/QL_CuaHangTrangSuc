<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <script src="./views/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/CSS/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/CSS/owl-carousel.css">

    <link rel="stylesheet" href="assets/CSS/lightbox.css">
    <title>QUẢN LÝ SẢN PHẨM</title>
    <link rel="shortcut icon" href="./assets/images/diamond3.png" type="image/x-icon">
</head>
<body>
<div class="container-fluid">
    <div class="container mar-top">
    <div class="containner text-center">
        <h3 style="background-color: orange; color: white; padding: 10px;">DANH SÁCH SẢN PHẨM</h3>
    </div>
        <?php
            include('./assets/controller/tmdt.php');
            $p = new tmdt();
            $f = new myfile();
            $layid = 0;
            if(isset($_REQUEST['id'])){
                $layid = $_REQUEST['id'];
            }
        ?>
        <div style="margin-top: 10px;">
          <form action="">
              <table class="table table-light table-striped">
                  <thead class="text-center">
                      <tr>
                          <th width="50px">MSP</th>
                          <th>Tên sản phẩm</th>
                          <th>Hình ảnh</th>
                          <th>Đơn giá</th>
                          <th>Loại sản phẩm</th>
                          <th>Xóa</th>
                          <th>Cập nhật</th>
                      </tr>
                  </thead>
                  <tbody class="text-center">
                      <?php
                          $p->dsSanPham('SELECT * FROM `sanpham` s INNER JOIN nhomsanpham n ON s.MaNSP=n.MaNSP');
                      ?>
                  </tbody>
              </table>
          </form>
        <a type="button" class="none_decor btn btn-info" id="btn-add" data-bs-toggle="modal" data-bs-target="#myModal">Thêm sản phẩm</a>
        </div>
      </div>
</div>


<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thêm sản phẩm</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
                    <label for="masp">Mã sản phẩm</label>
                    <input type="text" id="masp" name="masp">
                    <br><br>
                    <label for="tensp">Tên sản phẩm</label>
                    <input type="text" id="tensp" name="tensp">
                    <br><br>
                    <label for="loaisp">Loại sản phẩm</label>
                    <input type="number" min='1' max='5' id="loaisp" value="1" name="loaisp">
                    <br><br>
                    <label for="dongia">Đơn giá</label>
                    <input type="text" id="dongia" name="dongia">
                    <br><br>
                    <label for="soluong">Số lượng</label>
                    <input type="text" id="soluong" name="soluong">
                    <br><br>
                    <label for="mota">Mô tả</label>
                    <textarea id="mota" cols="30" rows="4" name="mota"></textarea>
                    <br><br>
                    <label for="hinhanh">Hình ảnh</label>
                    <input type="file" id="hinhanh" name="hinhanh">
                    <?php
				switch($_POST['them']){
					case 'Thêm sản phẩm':{
						$masp=$_REQUEST['masp'];
						$tensp=$_REQUEST['tensp'];
						$loaisp=$_REQUEST['loaisp'];
						$dongia=$_REQUEST['dongia'];
						$soluong=$_REQUEST['soluong'];
            $mota=$_REQUEST['mota'];
            $name=$_FILES['hinhanh']['name'];
						$type=$_FILES['hinhanh']['type'];
						$size=$_FILES['hinhanh']['size'];
						$tmp_name=$_FILES['hinhanh']['tmp_name'];
						if($name!='' && $type =='image/jpeg' || $type =='image/png'){
							if($f -> upload_hinh($name,$tmp_name,"views/img")==1){
								
								if($p->themxoasua("insert into sanpham(MaSP,TenSP,MaNSP,DonGia,SoLuongHang,MoTa,HinhAnh) values('$masp','$tensp', '$loaisp','$dongia','$soluong','$mota','$name')")==1){
									echo '<script> alert("Thêm sản phẩm thành công");</script>';
								}else{
									echo 'Thêm sản phẩm thất bại';
								}
								
							}else{
								echo 'Upload không thành công.';
							}
						}else{
							echo 'Vui lòng chọn hình đại diện';
						}
						break;
					}
				}
			?>
</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="them" id="add" value="Thêm sản phẩm">Thêm</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Thoát</button>
      </div>

    </div>
  </div>
</div>


<div class="modal" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thông báo</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
                Bạn có chắc muốn xóa sản phẩm này không?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a type="button" href="products_managerment.php?id=<?php echo$layid?>&xoa=xoasp" class="btn btn-primary">Có</a>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Không</button>
      </div>
    </div>
  </div>
</div>



<?php
    switch ($_GET['xoa']) {
        case 'xoasp':{
            $idxoa = $_REQUEST['id'];
            if($idxoa >= 0){
                if($p->themxoasua("delete from sanpham where MaSP='$idxoa' limit 1")==1){
                    echo '<script> alert("Xóa sản phẩm thành công");</script>';
                    
                }else{
                    echo 'Xóa không thành công';
                }
            }else{
                echo 'Vui lòng chọn sản phẩm cần phải xóa';
            }
            break;
        }
    }
?>



<div class="modal" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Chỉnh sửa sản phẩm</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form>
        <label for="masp">Mã sản phẩm</label>
                    <input type="text" id="masp" name="masp" value="<?php echo $p ->loadCot("select MaSP from sanpham where MaSP='$layid' limit 1 ");?>">
                    <br><br>
                    <label for="tensp">Tên sản phẩm</label>
                    <input type="text" id="tensp" name="tensp" value="<?php echo $p ->loadCot("select TenSP from sanpham where MaSP='$layid' limit 1 ");?>">
                    <br><br>
                    <label for="loaisp">Loại sản phẩm</label>
                    <input type="number" min='1' max='5' id="loaisp" value="1" name="loaisp" value="<?php echo $p ->loadCot("select MaNSP from sanpham where MaSP='$layid' limit 1 ");?>">
                    <br><br>
                    <label for="dongia">Đơn giá</label>
                    <input type="text" id="dongia" name="dongia" value="<?php echo $p ->loadCot("select DonGia from sanpham where MaSP='$layid' limit 1 ");?>">
                    <br><br>
                    <label for="soluong">Số lượng</label>
                    <input type="text" id="soluong" name="soluong" value="<?php echo $p ->loadCot("select SoLuongHang from sanpham where MaSP='$layid' limit 1 ");?>">
                    <br><br>
                    <label for="mota">Mô tả</label>
                    <textarea id="mota" cols="30" rows="4" name="mota"></textarea value="<?php echo $p ->loadCot("select MoTa from sanpham where MaSP='$layid' limit 1 ");?>">
                    <br><br>
                    <label for="hinhanh">Hình ảnh</label>
                    <input type="file" id="hinhanh" name="hinhanh">
        </form>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
      <a type="button" href="products_managerment.php?id=<?php echo$layid?>&sua=sua" class="btn btn-primary">cập nhật</a>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php
  switch ($_GET['sua']) {
      case 'sua':
          {
              $idsua = $_REQUEST['id'];
              $masp=$_REQUEST['masp'];
              $tensp=$_REQUEST['tensp'];
              $loaisp=$_REQUEST['loaisp'];
              $dongia=$_REQUEST['dongia'];
              $soluong=$_REQUEST['soluong'];
              $mota=$_REQUEST['mota'];    
              if($idsua > 0){
                  if($p->themxoasua("UPDATE sanpham SET MaSP ='$masp',TenSp ='$tensp',MaNSP ='$loaisp',DonGia ='$dongia', SoLuongHang ='$soluong', MoTa ='$mota' where masp ='$idsua' limit 1")==1){
                      echo '<script> alert("Sửa sản phẩm thành công");</script>';
                  }else{
                      echo 'Sửa không thành công';
                  }
              }else{
                  echo 'Vui lòng chọn sản phẩm cần sửa';
              }
              break;
          }
  }
?>

</body>


