<?php
$olduser=$_POST["old"];
$newuser=$_POST["new"];

$con=new mysqli("localhost","root","","myrdbms");
$query="update users set username=\" $newuser \" where username=\"$olduser\"";
if(!$con->query($query)){
	echo "Error in update for values $olduser
	, $newuser";
	echo $query;
}


?>