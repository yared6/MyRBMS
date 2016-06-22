<html>
<head>
<script src="../../js/ajax.js"></script>
</head>
<body>
<div id="container" style="width: 35%; margin-left: 30%" >
<table id="customers">
    <tr>
    <th style="background-color:#1DA362">Absent Employees on <?php echo date("d-m-20y"); ?></th>
  </tr>
  <tr>
    <th>Name</th>
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
    

    echo "<td>".$value[1]."</td>";
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
    
    echo "<td>".$value[1]."</td>";

    echo "</tr>";
    
}
    
}
    


?>
</table>
</div>
</body>
</html>
