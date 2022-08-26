<?php
    class connect{
        function connect()
	{				
		$con=mysqli_connect("localhost","admin","admin","Hexashop");
  		if(!$con)
   		{
	   		die("Khong ket noi duoc den CSDL");
			exit();
		}
		else
		{			
			mysqli_set_charset($con,"utf8");
			return $con;
		}
	}
}
?>