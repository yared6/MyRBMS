<html>
<title>Aministration</title>
<body style="background-color: blue; font-size: 300%"> 

<h2> Access to this site is stictly prohibited for users lacking an administrative privilage!! </h2>
<form action="admin_backup.php" method="POST">

current username: <input type="text" name="old" required><br>
new username: <input type="text" name="new" required><br>
<input type=submit value="update user name "> 

</form>


<form action="admin_user.php" method="POST">

user email:<input type="text" name="old" required><br>
new email:<input type="text" name="new" required><br>
<input value="Change back up email" type="submit"> 

</form>

<body>
<html>