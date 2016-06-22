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
    <div class="background-image"></div>
    <div id="container"><!--container-->
        
    <div id="header" class="header"><!--Header-->
       <div class="head">
           <ul id="head">
               <li><h1>MyRBMS</h1></li>
        <li><h2>Sara Supermarket</h2></li>
        <a id="logout"  href="../controlers/logout.php"><p id="log_p">Log out</p></a>
               </ul>
        </div>
        
        
    </div><!--End Header-->
        
    
        
        <div id="main_body"><!--Main Body-->
        <div id="menubar">
        <ul id="menuLists">
            <li class="menuLists" onclick="doClick(1)"><button class="menuLists" id="active1" onclick="ajaxInsertFile('OwnerHomePage.php', 'dynamic')" style="background-color: white">Home</button></li>

            <li class="menuLists"  onclick="doClick(2)"><button class="menuLists" id="active2" onclick="ajaxInsertFile('../controlers/show_report_today.php?button=showdaily', 'dynamic')" style="background-color: white">View Report</button></li>

            <li class="menuLists" onclick="doClick(3)"><button class="menuLists" id="active3" onclick="ajaxInsertFile('viewSentUpdates.php', 'dynamic')" style="background-color: white">View Updates</button></li>

            <li class="menuLists" onclick="doClick(4)"><button class="menuLists" id="active4" onclick="ajaxInsertFile('../controlers/view_attendance.php?ondate=0', 'dynamic')" style="background-color: white">View Attendance</button></li>

            <li class="menuLists" onclick="doClick(5)"><button class="menuLists" id="active5" onclick="ajaxInsertFile('viewSentScheduleTasks.php', 'dynamic')" style="background-color: white">View Scheduled Tasks</button></li>
        </ul>
        
        </div>
            
        <div id="dynamic">
            <div id="homepage">

<p> Welcome to mydbms, this site will help you to optimize and manage your business online. You can start by viewing the attendance of employees for the current date and move on to seeing their attendance status on any date by specifying the date. This site also contains features such as view report that lets you receive reports from your manager, view schedules that lets when to show up to your business centre and view updates that notifies you of whats happening at your business area where ever you are. And all of this features are just one click away from where you are. 
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