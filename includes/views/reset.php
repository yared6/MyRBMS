<html>
<head>
<script src="js/ajax.js"></script>
<link rel='stylesheet' type='text/css' href='../../styles/index.css'>
    </head>
    
    <body>
        <div id="reset_container">
            <center><img id="logo" src="../../image/logo1.PNG"></center>
            <div id="reset">
        <form action="../controlers/reset_password.php" method="post">
        User name <input id="user_name" type="text" name="username" required><br><br>
        E-mail <input id="e_mail" type="email" name="email" required><br><br>
        Email Password <input id="pass_word" type="password" name="pwd" required><br><br>
        New Password <input id="new_password" type="password" name="newpassword" required><br><br>
            <input id="for_reset" type="submit" value="Reset">
        </form>
                </div>
    </div>
    </body>
    
</html>