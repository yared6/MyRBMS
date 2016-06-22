
      <html>
<head>
<script src="../../js/ajax.js"></script>
</head>
<body>
     <div id="container">
<table id="customers">
  <tr>
    <th style="background-color:#1DA362">Date</th>
    <th colspan="2", style="background-color:#1DA362; "><?php echo date("d-m-20y"); ?></th>
    <th colspan="2", style="background-color:#1DA362"></th>
  </tr>
    
  <tr>
    <th>Time</th>
    <th>Title</th>
    <th>Description</th>
    <th>Resolve</th>
  </tr>
  
    

   <?php
	//include "../../js/ajax.js";
    include "../Models/Update.php";
    $update = new SendUpdateHandler("", "");

    if(isset($_GET['delid'])){
        $update->resolve('updateID', $_GET['delid']);
        //header("Location: ../views/owner_home.php");
        //ajaxInsertFile('../views/owner_home.php', 'dynamic');
      } 

$update1 = new SendUpdateHandler("",""); //arguments not needed

$viewUpdate1 = $update1->viewUpdate("DATE(reg_date) = CURDATE()");
//echo date("d-m-20y");
//echo "<form action='$_SERVER[PHP_SELF]' method='post'>";
foreach ($viewUpdate1 as $value) {
    $id = $value[0];
    $time = $value[3];
    $h1 = $time[11];
    $h2 = $time[12];
    
    $m1 = $time[14];
    $m2 = $time[15];
    
    $s1 = $time[17];
    $s2 = $time[18];

    $time2 = $h1. "" .$h2. ":" .$m1."".$m2.":".$s1."".$s2;
    $title =  $value[1];
    $description = $value[2];
    echo "<tr class='alt'>";
    echo "<td>$time2 <br></td>";
    echo "<td>$title <br></td>";
    echo "<td>$description <br></td>";
    $fordelid = "../controlers/deletecontroler.php?delid=$id";
    //echo "<td><button><a href=\"../controlers/deletecontroler.php?delid=$id\">Resolve</a></button></td>";
    echo "<td><input type=\"submit\" value=\"Resolve\" onclick='ajaxInsertFile(\"../controlers/deletecontroler.php?delid=$id\", \"dynamic\")'></td>";
    echo "</tr>";
    //echo "<input type='button' value='Delete' name='delete'>"
}

?>

</table>
</div>
</body>
</html>
