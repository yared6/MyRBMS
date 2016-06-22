<html>
<head>
    
    <script>
    
        function validate(){
            var priority = document.forms["sendScheduleTaskForm"]["priority"].value;
            if (priority == null || priority == "") { 
                alert("priority must be filled out");
                return false;
            }

            var time = document.forms["sendScheduleTaskForm"]["time"].value;
            if (time == null || time == "") { 
                alert("time must be filled out");
                return false;
            }
            
            
            var description = document.forms["sendScheduleTaskForm"]["description"].value;

            if (description == null || description == "") { 
                alert("Description must be filled out");
                return false;
            }
            
        }
    </script>
    
    </head>
    
    <body>
      <div id="send_scheduleTask">  
    <form name="sendScheduleTaskForm" action="../controlers/scheduleTaskControler.php" method = "post" onsubmit = "validate()">

        Priority <br><input type="text" name="priority" required>
            <br><br>

        Time <br><input type="time" name="time" required>
            <br><br>
        
        Description <br><textarea  type="text" name="description" rows=11 cols=70 required>

        </textarea><br><br>
            <input  style="background-color: green; cursor: pointer; width: 140px; color: white;" type="submit" value="Send Scheduled Task">
    </form>
    </div>
</body>
</html>