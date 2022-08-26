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

    <link rel="stylesheet" type="text/css" href="assets/CSS/bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="assets/CSS/font-awesome.css">

    <link rel="stylesheet" href="assets/CSS/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/CSS/owl-carousel.css">

    <link rel="stylesheet" href="assets/CSS/lightbox.css">


<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>
    
    <body>
    <div>
        <?php       
            include './views/partials/header.php';
        ?>
    </div>    
    <div>
        <?php
            if((isset($_GET['page']))&&($_GET['page']!="")){
                $act=$_GET['page'];
                switch ($act) {
                    case 'products':
                        include "./views/layouts/products.php";
                        break;

                    case 'about':
                        include "./views/layouts/about.php";
                        break;
                    
                    case 'cart':
                        include "./views/layouts/cart.php";
                        break;

                    case 'contact':
                        include "./views/layouts/contact.php";
                        break;

                    case 'detail':
                        include "./views/layouts/detailProduct.php";
                        break;

                    case 'payment':
                        include "./views/layouts/payment.php";
                        break;

                    default:
                        include "./views/layouts/home.php";
                        break;
                }
            }
            else{
                include "./views/layouts/home.php";
            }

            include './views/partials/footer.php';
        ?>
    </div>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>
</html>