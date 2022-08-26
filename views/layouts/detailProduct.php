<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Single Product Page</h2>
                    <span>Our product quality is the best</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->


<!-- ***** Product Area Starts ***** -->
<section class="section" id="product">
    <div class="container">
    <?php
        include('./assets/controller/tmdt.php');
        $layTenSP=$_REQUEST['TenSP'];
        $p = new tmdt();
        $p -> loaddetail("select * from sanpham where TenSP = '$layTenSP'")
    ?>
    </div>
</section>
<!-- ***** Product Area Ends ***** -->