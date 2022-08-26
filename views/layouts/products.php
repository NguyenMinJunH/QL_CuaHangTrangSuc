<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Check Our Products</h2>
                    <span>Made with love, forever remembered</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->


<!-- ***** Products Area Starts ***** -->
<section class="section" id="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Our Latest Products</h2>
                    <span>Check out all of our products.</span>
                </div>
            </div>
        </div>
    </div>


<?php
include './assets/controller/tmdt.php';
$p = new tmdt();
$id_loai = new tmdt();
?>
    <div class="container">
        <div class="row">
            <?php
            $id = $_GET['act'];
            if($id > 0)
                {
                    $p-> loaddulieu("select * from sanpham where MaNSP = '$id'");
                }else {
                    $p-> loaddulieu("select * from sanpham");
                }
            ?>
            
            <div class="col-lg-12">
                <div class="pagination">
                    <ul>
                        <li>
                            <a href="#">1</a>
                        </li>
                        <li class="active">
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#">4</a>
                        </li>
                        <li>
                            <a href="#">></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Products Area Ends ***** -->
