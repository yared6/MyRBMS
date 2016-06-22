<html>
<head>
<title>MyRBMS</title>
    <?php 
        
        require_once "../controlers/session_controler.php";
        redirection();
    ?>
    <script src="../../js/ajax.js"></script>
    <link rel="stylesheet" type="text/css" href="../../styles/style.css">
    <script src="../../js/style.js"></script>
    <title><?php echo $title ?></title>
    </head>
<body>
    <div id="container"><!--container-->
        
    <div id="header"><!--Header-->
       <div class="head">
           <ul id="head">
               <li><h1>MyRBMS</h1></li>
        <li><h2>Sara Supermarket</h2></li>
        <a id="logout" href="../controlers/logout.php">Log out</a>

               </ul>
        </div>
        
        
        
    </div><!--End Header-->
        
    
        
        <div id="main_body"><!--Main Body-->
        <div id="menubar">
        <ul id="menuLists">
            <li class="menuLists" onclick="doClick(1)" ><button class="menuLists" id="active1" onclick="ajaxInsertFile('managerHomePage.php', 'dynamic')"  style="background-color: white">Home</button></li>

            <li class="menuLists" onclick="doClick(2)"><button class="menuLists" id="active2" onclick="ajaxInsertFile('sendReportForm.php', 'dynamic')" style="background-color: white">Send Report</button></li>

            <li class="menuLists" onclick="doClick(3)"><button class="menuLists" id="active3" onclick="ajaxInsertFile('sendUpdateForm.php', 'dynamic')" style="background-color: white">Send Updates</button></li>

            <li class="menuLists" onclick="doClick(4)"><button class="menuLists" id="active4" onclick="ajaxInsertFile('../controlers/take_attendance.php?ondate=0', 'dynamic')" style="background-color: white">Take Attendance</button></li>

            <li class="menuLists" onclick="doClick(5)"><button class="menuLists" id="active5" onclick="ajaxInsertFile('registerform.php', 'dynamic')" style="background-color: white">Register</button></li>

            <li class="menuLists" onclick="doClick(6)"><button class="menuLists" id="active6" onclick="ajaxInsertFile('sendScheduleTaskForm.php', 'dynamic')" style="background-color: white">Schedule Task</button></li>
        </ul>
        
        </div>
            
        <div id="dynamic">
            <div id="homepage">
<p> Welcome to mydbms, this site will help you easily communicate with the owner and letting the owner participate more on the day to day activities. You can start by sending the attendance of employees for the current date. This site also contains features such as sending report that lets you send reports to the owner, send schedules that lets you tell the owner when to show up to his business centre and view updates that lets you tell the owner of whats happening at his business area . And all of this features are just one click away from where you are. 
    <br><br>Thank you for using our product!!
</p>
</div>
            
            </div>
        
        </div><!--End main body-->
        
        <div id="footer"><!--Footer-->
        <ul>
            <a href="#"><li class="footerList">Contact</li></a>
            <a href="#"><li class="footerList">About us</li></a>
            <a href="#"><li class="footerList">Privacy policy</li></a>
            <a href="#"><li>Terms and conditions</li></a>
            
            </ul>
            <p>2016 &copy;copyright MyRBMS. All Right Reserved.</p>
        </div><!--End Footer-->
        
        </div><!--End container-->
    </body>
</html>