function TestUserName(){
    var user = document.getElementById('exampleInputUsername1').value;
    var test = /^[A-Za-z0-9_]{5,32}$/
    if(user == "") {
        document.getElementById('err').innerHTML = "Username khong duoc de trong";
        return false;
    }else
    {
        if(test.test(user)){
            document.getElementById('err').innerHTML="";
            return true;
        }else
        document.getElementById('err').innerHTML="Username chua it nhat 5 ky tu bao gom chu va so";
        return false;
    }
}

function TestPassWord(){
    var Password = document.getElementById('exampleInputPassword1').value;
    var test = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/
    if(Password == "") {
        document.getElementById('err').innerHTML = "Mat khau khong duoc de trong";
        return false;
    }else
    {
        if(test.test(Password)){
            document.getElementById('err').innerHTML="";
            return true;
        }else
        document.getElementById('err').innerHTML="Password chua toi thieu 8 ky tu bao gom chu va so";
        return false;
    }
}

function TestAll(){
    var user = document.getElementById('exampleInputUsernam1').value;
    var Password = document.getElementById('exampleInputPassword1').value;
    if(user == "" || Password == ""){
        document.getElementById("err").innerHTML = "Du lieu khong duoc de trong"
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