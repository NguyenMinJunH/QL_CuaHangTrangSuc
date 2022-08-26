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
    <div id="login-signup" class="mar_center">
        <div id="login_1-signup">
            <div id="div-signup" >
                <h3 class="text-light text-center">Sign up</h3>
            </div>
            <div >
                <form method="POST" action="login.php">
                <span id="err" class="text-danger"></span>
                    <div class="mb-3 input-icon">
                        <label for="exampleInputUsername1" class="form-label text-light">Username</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" onblur="TestUserName1()" placeholder="Enter your username" name="txtusersignup" required="">
                        <i class="fa fa-user icon"></i>
                    </div>
                    <div class="mb-3 input-icon">
                        <label for="exampleInputEmail1" class="form-label text-light">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" onblur="TestEmail()" placeholder="Enter your email" required="">
                        <i class="fa fa-envelope icon"></i>
                    </div>
                    <div class="mb-3 input-icon">
                        <label for="exampleInputPassword1" class="form-label text-light">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" onblur="TestPassWord1()" placeholder="Enter your password" name="txtpasssignup" required="">
                        <i class="fa fa-key icon"></i>
                    </div>
                    <div class="mb-3 input-icon">
                        <label for="exampleInputPassword2" class="form-label text-light">Retype your password</label>
                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Retype your password" name="txtpasssignup1" required="">
                        <i class="fa fa-key icon"></i>
                    </div>
                    <button type="submit" class="container btn btn-primary" name="submit1" onclick="Submit()">Submit</button>

                    <?php
                        if(isset($_POST["submit1"]))
                        {
                            $con=mysqli_connect("localhost","admin","admin","Hexashop");

                            $username = $_POST["txtusersignup"];
                            $password = $_POST["txtpasssignup"];
                            $password1 = $_POST["txtpasssignup1"];

                            //So sánh 2 mật khẩu có trùng khớp hay không
                            if ($password != $password1) {
                            echo '<div class="text-danger">
                            Mật khẩu không trùng khớp. Vui lòng kiểm tra lại.
                            </div>';
                            exit;
                            }
                        }

                    ?>
                </form>
            </div>
            <!--<div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>-->
        </div>
    </div>

    <script>
    function TestUserName1(){
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
            document.getElementById('err').innerHTML="Username chứa ít nhất 5 kí tự bao gồm chữ và số, và không có dấu";
            return false;
        }
    }

    function TestPassWord1(){
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

    function TestEmail(){
    var Password = document.getElementById('exampleInputEmail1').value;
    var test = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(Password == "") {
        document.getElementById('err').innerHTML = "Email không được để trống";
        return false;
    }else
    {
        if(test.test(Password)){
            document.getElementById('err').innerHTML="";
            return true;
        }else
        document.getElementById('err').innerHTML="Email không chính xác, thiếu @ hoặc .com";
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

    function Submit(){
        if(TestUserName1() == true && TestPassWord1() == true && TestEmail() == true)
        {
            alert("Đăng ký thành công!");
            return true;
        }else return false;
    }
</script>
</body>
</html>
