<?php
function setsession($user){
	session_start();
	$_SESSION['user']=$user;
}
function sessioncheck(){
	session_start();
	if (@$_SESSION["user"] !== null){
			return @$_SESSION["user"];
	}
	else{
			
			return false;
	}
}
function redirection(){
	session_start();
	if (!$_SESSION['user'] ){
				
				session_start();
    			session_destroy();
    			header("Location: ../../index.php");
   				exit();
			
	}
	

}
?>