<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop - Login Page</title>
    <link rel="shortcut icon" href="./assets/images/diamond3.png" type="image/x-icon">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/CSS/bootstrap.min.css">

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
    <div id="login"  class="mar_center">
    <div id="login_1">
        <div id="div-signin">
            <h3 class="text-light text-center">Sign in</h3>
        </div>
        <div>
            <form action="" method="post">
                <span id="err" class="text-danger"></span>
                <div class="mb-3 input-icon">
                    <label for="exampleInputEmail1" class="form-label text-light">Username</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" onblur="TestUserName()" name="txtusername">
                    <i class="fa fa-user icon"></i>
                </div>
                <div class="mb-3 input-icon">
                    <label for="exampleInputPassword1" class="form-label text-light">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" onblur="TestPassWord()" name="txtpassword">
                    <i class="fa fa-key icon"></i>
                    <i class="fa fa-eye-slash icon-eye" type="button" id="show" onclick="HidePassword()"></i>
                </div>
                <button type="submit" class="container btn btn-primary" onclick="return TestAll();" name="submit" value="signin">Submit</button>

                <?php
                    if(isset($_POST["submit"]))
                    {
                        $con=mysqli_connect("localhost","admin","admin","Hexashop");

                        $username = $_POST["txtusername"];
                        $password = $_POST["txtpassword"];

                        $query = mysqli_query($con,"SELECT Username, Password1 FROM taikhoan where Username = '$username'");
                        if (mysqli_num_rows($query) == 0) {
                            echo '<div class="text-danger">
                            Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href="login.php"> Quay lại</a>
                            </div>';
                            exit;
                        }

                        //Lấy mật khẩu trong database ra
                        $row = mysqli_fetch_array($query);

                        //So sánh 2 mật khẩu có trùng khớp hay không
                        if ($password != $row['Password1']) {
                        echo '<div class="text-danger">
                        Mật khẩu không đúng. Vui lòng kiểm tra lại.
                        </div>';
                        exit;
                        }
                        
                                                
                        //Nếu là admin thì đưa vào trang admin
                        if($username =='ADMIN' && $password == 'admin123')
                        {
                            header("location:admin.php");
                        }else{
                            $_SESSION['Username'] = $username;
                            header("location:index.php?act=home");
                            $password = md5($password);
                            die();
                        }

                    }

                ?>
            </form>
        </div>
    <div id="login_2">
        <p class="text-light">If you don't have accout? <a href="./signup.php">REGISTER NOW</a> </p>
    </div>
    </div>
</div>

<script>
    function TestUserName(){
        var x = document.getElementById("exampleInputUsername1");
        x.value = x.value.toUpperCase();
        var user = document.getElementById('exampleInputUsername1').value;
        var test = /^[A-Za-z0-9_]{5,32}$/
        if(user == "") {
            document.getElementById('err').innerHTML = "Username không được để trống";
            return false;
        }else
        {
            if(test.test(user)){
                document.getElementById('err').innerHTML="";
                return true;
            }else
            document.getElementById('err').innerHTML="Username chứa ít nhất 5 kí tự bao gồm chữ và số";
            return false;
        }
    }

    function TestPassWord(){
    var Password = document.getElementById('exampleInputPassword1').value;
    var test = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/
    if(Password == "") {
        document.getElementById('err').innerHTML = "Mật khẩu không được để trống";
        return false;
    }else
    {
        if(test.test(Password)){
            document.getElementById('err').innerHTML="";
            return true;
        }else
        document.getElementById('err').innerHTML="Password chứa tối thiểu 8 ký tự bao gồm chữ và số";
        return false;
    }
    }

    function TestAll(){
        var user = document.getElementById('exampleInputUsername1').value;
        var Password = document.getElementById('exampleInputPassword1').value;
        if(user == "" || Password == ""){
            document.getElementById("err").innerHTML = "Dữ liệu không được để trống"
            return false;
        }else{
            if(TestUserName() == false || TestPassWord() == false){
                document.getElementById("err").innerHTML = "";
                return false;    
            }else{
                return true;
            }
        }
    }

    function HidePassword(){
        var Password = document.getElementById("exampleInputPassword1");
        var toggle = document.getElementById("show");
        if(Password.type == "password"){
            Password.type = "text";
            toggle.classList.remove("fa fa-eye-slash");
            toggle.classList.add("fa fa-eye");
        }else{
            Password.type = "password";
            toggle.classList.remove("fa fa-eye");
            toggle.classList.add("fa fa-eye-slash");
        }
    }
</script>
    </body>
</html>