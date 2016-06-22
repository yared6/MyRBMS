<html>
<head>
    
    <script>
    
        function validate(){
            var total_sales = document.forms["sendReportForm"]["sales"].value;
            if (title == null || title == "") { 
                alert("Total sales must be filled out");
                return false;
            }
            
            
            var juice_sales = document.forms["sendReportForm"]["juice"].value;

            if (description == null || description == "") { 
                alert("Juice sales must be filled out");
                return false;
            }

            var bread_sales = document.forms["sendReportForm"]["bread"].value;

            if (description == null || description == "") { 
                alert("Bread sales must be filled out");
                return false;
            }

            var cash_in_hand = document.forms["sendReportForm"]["cash"].value;

            if (description == null || description == "") { 
                alert("Cash in hand must be filled out");
                return false;
            }
            
        }
    </script>
    
    </head>
    
    <body>
       <div id="send_report"> 
    <form name="sendReportForm" action="../controlers/send_report.php" method = "post" onsubmit = "validate()">

        Total Sales <br><input type="number" name="sales" required>
            <br><br>

        Juice Sales <br><input type="number" name="juice" required>
            <br><br>

        Bread Sales <br><input type="number" name="bread" required>
            <br><br>

        Cash in hand <br><input type="number" name="cash" required=>
            <br><br>
        
        
            <input  style="background-color: green; cursor: pointer; width: 140px; color: white;" type="submit" value="Send Report">
    </form>
    </div>
</body>
</html>