<?php
$olduser=$_POST["old"];
$newuser=$_POST["new"];

$con=new mysqli("localhost","root","","myrdbms");
$query="update backup set email=\" $newuser \" where email=\"$olduser\" ;";
if(!$con->query($query)){
	echo "Error in updating email for values $olduser
	, $newuser";
	echo $query;
}
$con->close();

?>