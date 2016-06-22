<html>
<head>
<script src="js/ajax.js"></script>
<link rel='stylesheet' type='text/css' href='styles/index.css'>
</head>
<body >
<div id="container">
    <div id="login">
    <center><img id="logo" src='image/logo1.PNG'></center>
    <ul>
    <form id="form1" onsubmit="ajaxInsertFilePost('includes/controlers/login.php','dynamic')" method="POST"><br>
        <li>Username:<input id="username" height="500px" required type="text" name="username"><br></li><br>
        <li id="">Password:  <input id="password" required type="password" name="password"><br><br></li>
        <li ><a href="includes/views/reset.php" style="text-decoration: none"> <i>Forgot/Change password</i></a></li><br><br>
        
        <input id='sub' type="button" onclick="ajaxInsertFilePost('includes/controlers/login.php','dynamic')" value="Log In"/>
        <div id="dynamic"></div>
        </div>
    </form>
    </ul>
       
</body>
</html>