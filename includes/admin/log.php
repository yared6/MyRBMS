<?php

$pass=$_POST["password"];
$data=Array();
if (isset($pass)){
	$con=new mysqli("localhost","root","","myrdbms");
	$sql="select * from admin;";
	$result=$con->prepare($sql);
	$result->execute();

	$result->bind_result($finalpass);
	if($result->num_rows >= 0){
	while($row = $result->fetch()){
		$col = array();
		$col[0] = $finalpass;
		array_push($data, $col);
	}
} else{
	echo "0 results";
}
	$con->close();
	if (!strcmp($finalpass,$pass)){
		header("location: admin_controler.php");

	}
	else{
		//echo strcmp($finalpass,$pass);
		echo "Insert a correct passoword";
	}

}
else{

	echo "please fill the password!";
}


?>