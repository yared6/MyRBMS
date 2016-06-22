<html>
<head>
<script src="../../js/ajax.js"></script>
</head>
<body>
<div id="container">
<table id="customers">
    
  <tr>
    <th>ID No</th>
    <th>Name</th>
    <th>Status</th>
  </tr>


<?php

// *****        use the ondate="your date "             *******
// *****        id=the                                  *******
// *****        name=empname on the php get file        *******


include '../Models/Attendance.php';


if(isset($_REQUEST['ondate'])){

$at=new Attendance('attendance');
if($_REQUEST['ondate']==0){
    $res=$at->getItems();
    
}
else{
    $res=$at->getItems($_REQUEST['ondate']);
}

foreach ($res as $value) {
                                                 
    echo "<tr class='alt'>";
    echo "<script src='../../js/ajax.js'></script>";
    echo "<td>".$value[0]."</td>";

    echo "<td>".$value[1]."</td>";
    echo "<td><input type=\"submit\" value=\"Present\" onclick='ajaxInsertFile(\"../controlers/take_attendance.php?id=$value[0]\",\"dynamic\")'></td>";

    echo "</tr>";
    
}
}

if (isset($_REQUEST['id']) ){
    $at=new Attendance('attendance');
    $res=$at->attend($_REQUEST['id']);

    $at=new Attendance('attendance');
    $res=$at->getItems();

foreach ($res as $value) {                                            
    echo "<tr class='alt'>";
    echo "<script src='../../js/ajax.js'></script>";
    echo "<td>".$value[0]."</td>";

    echo "<td>".$value[1]."</td>";
    echo "<td><input type=\"submit\" value=\"Present\" onclick='ajaxInsertFile(\"../controlers/take_attendance.php?id=$value[0]\",\"dynamic\")'></td>";

    echo "</tr>";
    
}
    
}
    


?>
</table>
</div>
</body>
</html>
