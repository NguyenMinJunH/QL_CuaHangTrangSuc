<?php
session_start();
$slsp = 0;
if(isset($_SESSION['giohang'])) $slsp = sizeof($_SESSION['giohang']);
?>
<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <img src="assets/images/logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.php" class="active">Home</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Products</a>
                                <ul>
                                    <li><a href="index.php?page=products&act=0">All products</a></li>
                                    <li><a href="index.php?page=products&act=1">Nhẫn</a></li>
                                    <li><a href="index.php?page=products&act=3">Vòng tay</a></li>
                                    <li><a href="index.php?page=products&act=4">Dây cổ</a></li>
                                    <li><a href="index.php?page=products&act=5">Kiềng</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="index.php?page=about">About Us</a></li>
                            <li class="scroll-to-section"><a href="index.php?page=contact">Contact us</a></li>
                            <li class="scroll-to-section" style="margin-left: 30px;"><p><?php if(isset($_SESSION['Username'])){
                                    $Username = $_SESSION['Username'];
                                    echo( $Username);
                                    }?></p></li>
                            <li style="margin-left: -60px;"><p><div class="dropdown mar-btn">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="#">Thông tin đơn hàng</a>
                                      <a class="dropdown-item" href="./logout.php">Đăng xuất</a>
                                    </div>
                                </div></p>
                            </li>
                            <li style="position:relative;" class="scroll-to-section"><a href="index.php?page=cart"><i style="font-size: 25px;" class="fa fa-shopping-cart"></i></a>
                            <p style="position:absolute;" id="number-cart"><?php echo ($slsp);?></p></li>
                            

                        </ul>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>