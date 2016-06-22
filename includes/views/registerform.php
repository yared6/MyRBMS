<html>
<head>
    
    <script>
    
        function validate(){
            var employee_id = document.forms["registerForm"]["employee_id"].value;
            if (employee_id == null || employee_id == "") { 
                alert("Employee id must be filled out");
                return false;
            }
            
            
            var employee_name = document.forms["registerForm"]["employee_name"].value;

            if (employee_name == null || employee_name == "") { 
                alert("employee name must be filled out");
                return false;
            }
            
        }
    </script>
    
    </head>
    
    <body>
       <div id="register"> 
    <form name="registerForm" action="../controlers/register_employee.php" method = "post" onsubmit = "validate()">

        Employee ID <br><input type="number" name="employee_id" required>
            <br><br>

        Employee Name <br><input type="text" name="employee_name" required>
            <br><br>
        
            <input  style="background-color: green; cursor: pointer; width: 140px; color: white;" type="submit" value="Register">
    </form>
    </div>
</body>
</html>