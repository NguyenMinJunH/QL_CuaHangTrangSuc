<?php
include "./assets/controller/connect.php";
class tmdt extends connect{
	
	function loaddulieu($sql)
{
	$link=$this->connect();
	$ketqua=mysqli_query($link,$sql);
	$i=mysqli_num_rows($ketqua);
	@mysqli_close($link);
	if($i>0)
	{
		while($row=@mysqli_fetch_array($ketqua))
		{
			$MaSP = $row ["MaSP"];
			$TenSP = $row ["TenSP"];
			$DonGia = $row ["DonGia"];
			$MaNSP = $row ["MaNSP"];
			$Img = $row["HinhAnh"];

			echo '<div class="col-lg-4 bg-white">
			<form>
			<div class="item">
				<div class="thumb bg-linear">
					<div class="hover-content">
						<ul>
						</ul>
					</div>
					<img src="assets/images/'.$Img.'" alt="">
				</div>
				<div class="down-content bg-white">
					<h5>'.$TenSP.'</h5>
					<span>'.$DonGia.'.000/vnđ</span>
					<a href="index.php?page=detail&TenSP='.$TenSP.'"><i  style="float: left" class="fa fa-eye"></i></a>
					<ul class="stars">
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
						<li><i class="fa fa-star"></i></li>
					</ul>
				</div>
			</div>
			</form>
		</div>';

		}	
	}
	else
	{
		echo 'Không có dữ liệu';
	}
	
}


function loaddulieu2($sql)
{
	$link=$this->connect();
	$ketqua=mysqli_query($link,$sql);
	$i=mysqli_num_rows($ketqua);
	@mysqli_close($link);
	if($i>0)
	{
		while($row=@mysqli_fetch_array($ketqua))
		{
			$MaSP = $row ["MaSP"];
			$TenSP = $row ["TenSP"];
			$DonGia = $row ["DonGia"];
			$Img = $row["HinhAnh"];

			echo '<div class="item">
			<div class="thumb bg-linear">
				<div class="hover-content">
					<ul>
						<li><a href="index.php?page=detail&TenSP='.$TenSP.'"><i class="fa fa-eye"></i></a></li>
						<li><a href="#"><i class="fa fa-star"></i></a></li>
						<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
					</ul>
				</div>
				<img src="assets/images/'.$Img.'" alt="">
			</div>
			<div class="down-content">
				<h5>'.$TenSP.'</h5>
				<span>'.$DonGia.'.000/vnđ</span>
				<ul class="stars">
					<li><i class="fa fa-star"></i></li>
					<li><i class="fa fa-star"></i></li>
					<li><i class="fa fa-star"></i></li>
					<li><i class="fa fa-star"></i></li>
					<li><i class="fa fa-star"></i></li>
				</ul>
			</div>
		</div>';

		}	
	}
	else
	{
		echo 'Không có dữ liệu';
	}
	
}



function loadloaisp($sql)
{
	$link=$this->connect();
	$ketqua=mysqli_query($link,$sql);
	$i=mysqli_num_rows($ketqua);
	@mysqli_close($link);
	if($i>0)
	{
		while($row=@mysqli_fetch_array($ketqua))
		{
			$MaNSP = $row ["MaNSP"];
			$TenSP = $row ["TenNSP"];
			echo '
			<div id="loaisp">
				<ul>
					<li class="none_decor">
						<a class="none_decor" id="li-loaisp" href="index.php?act=shop_all&id='.$MaNSP.'">'.$TenSP.'</a>
					</li>
				</ul>
			</div>';
		}	
	}
	else
	{
		echo 'Không có dữ liệu';
	}	
}

function loaddetail($sql)
{
	$link=$this->connect();
	$ketqua=mysqli_query($link,$sql);
	$i=mysqli_num_rows($ketqua);
	@mysqli_close($link);
	if($i>0)
	{
		while($row=@mysqli_fetch_array($ketqua))
		{
			$TenSP = $row ["TenSP"];
			$DonGia = $row ["DonGia"];
			$Detail = $row["MoTa"];
			$Img = $row["HinhAnh"];

			echo '<form action="index.php?page=cart" method="POST">
			<input type="hidden" value="'.$TenSP.'" name="TenSP">
			<input type="hidden" value="'.$Img.'" name="Img">
			<input type="hidden" value="'.$DonGia.'" name="Dongia">
			<div class="row">
				<div class="col-lg-8">
					<div class="left-images">
						<img src="assets/images/'.$Img.'" alt="">
					</div>
				</div>
			<div class="col-lg-4">
			<div class="right-content">
				<h5>'.$TenSP.'</h5>
				<span class="price">'.$DonGia.'.000/vnđ</span>
				<ul class="stars">
					<li><i class="fa fa-star"></i></li>
					<li><i class="fa fa-star"></i></li>
					<li><i class="fa fa-star"></i></li>
					<li><i class="fa fa-star"></i></li>
					<li><i class="fa fa-star"></i></li>
				</ul>
				<span style="text-align: justify; text-indent: 25px">'.$Detail.'</span>
				<div class="quantity-content">
					<div class="left-content">
						<h6>Số lượng</h6>
					</div>
					<div class="right-content">
						<div>
							<input type="number" min="1" max="5" value="1" step="1" name="Soluong">
						</div>
					</div>
				</div>
				<div class="total">
					<div class="main-border-button"><input id="btn-submit" type="submit" name="Buy" value="Add To Cart" /></div>
				</div>
			</div>
		</div>
		</div>
		</form>';
		}	
	}
	else
	{
		echo 'Không có dữ liệu';
	}
	
}

function themxoasua($sql)
{
	$link=$this->connect();
	if(mysqli_query($link, $sql))
	{
		return 1;
	}
	else
	{
		return 0;
	}		
}

function dsSanPham($sql)
{
	$link=$this->connect();
	$ketqua=mysqli_query($link,$sql);
	$i=mysqli_num_rows($ketqua);
	@mysqli_close($link);
	if($i>0)
	{
		while($row=@mysqli_fetch_array($ketqua))
		{
			$MaSP = $row ["MaSP"];
			$TenSP = $row ["TenSP"];
			$DonGia = $row ["DonGia"];
			$TenNSP = $row ["TenNSP"];
			$Img = $row["HinhAnh"];

			echo'<tr class="text-center height-150px">
			<td><a href="?id='.$MaSP.'" style="color: black; text-decoration: none;">'.$MaSP.'</a></td>
			<td>'.$TenSP.'</td>
			<td><img width="100px" height="100px" src="assets/images/'.$Img.'" alt=""></td>
			<td>'.$DonGia.'.000/vnđ</td>
			<td>'.$TenNSP.'</td>
			<td><a type="button" class="none_decor btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal1">Xóa</a></td>
			<td><a class="none_decor btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal2">Cập nhật</a></button></td>
			</tr>';

		}	
	}
	else
	{
		echo 'Không có dữ liệu';
	}
	
}

function dsTaiKhoan($sql)
{
	$link=$this->connect();
	$ketqua=mysqli_query($link,$sql);
	$i=mysqli_num_rows($ketqua);
	@mysqli_close($link);
	if($i>0)
	{
		while($row=@mysqli_fetch_array($ketqua))
		{
			$Username = $row ["Username"];
			$Password1 = $row ["Password1"];
			$Email = $row ["Email"];
			$Phanquyen = $row ["Phanquyen"];

			echo'<tr class="text-center height-150px">
			<td>'.$Username.'</td>
			<td>'.$Password1.'</td>
			<td>'.$Email.'</td>
			<td>'.$Phanquyen.'</td>
			<td><a class="none_decor btn btn-danger" href="">Xóa</a></td>
			<td><a class="none_decor btn btn-primary">Chỉnh sửa</a></button></td>
			</tr>';

		}	
	}
	else
	{
		echo 'Không có dữ liệu';
	}
	
}

public function loadCot($sql){
	$link = $this -> connect();
	$ketqua = mysqli_query($link,$sql);
	mysqli_close($link);
	$i = mysqli_num_rows($ketqua);
	$kq = '';
	if($i > 0){
		while($row=mysqli_fetch_array($ketqua)){
			$id = $row[0];
			$kq = $id;
		}
	}
	return $kq;
}

function dsNhanVien($sql)
{
	$link=$this->connect();
	$ketqua=mysqli_query($link,$sql);
	$i=mysqli_num_rows($ketqua);
	@mysqli_close($link);
	if($i>0)
	{
		while($row=@mysqli_fetch_array($ketqua))
		{
			$MaNV = $row ["MaNV"];
			$HoTen = $row ["HoTen"];
			$GioiTinh = $row ["GioiTinh"];
			$NgaySinh = $row ["NgaySinh"];
			$DiaChi = $row ["DiaChi"];
			$DienThoai = $row ["DienThoai"];
			$Ghichu = $row ["GhiChu"];


			echo'<tr class="text-center height-150px">
			<td>'.$MaNV.'</td>
			<td>'.$HoTen.'</td>
			<td>'.$GioiTinh.'</td>
			<td>'.$NgaySinh.'</td>
			<td>'.$DiaChi.'</td>
			<td>'.$DienThoai.'</td>
			<td>'.$Ghichu.'</td>

			<td><a class="none_decor btn btn-danger" href="">Xóa</a></td>
			<td><a class="none_decor btn btn-primary">Chỉnh sửa</a></button></td>
			</tr>';

		}	
	}
	else
	{
		echo 'Không có dữ liệu';
	}
	
}
}


class myfile{
	function upload_hinh ($name, $tmp_name, $folder)
	{
		if($name!='' && $folder!='')
		{
			$newname= $folder."/".$name;
			if(move_uploaded_file($tmp_name, $newname))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}
}
?>
