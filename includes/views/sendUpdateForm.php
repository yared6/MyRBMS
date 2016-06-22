<html>
<head>
    
    <script>
    
        function validate(){
            var title = document.forms["sendUpdateForm"]["title"].value;
            if (title == null || title == "") { 
                alert("Title must be filled out");
                return false;
            }
            
            
            var description = document.forms["sendUpdateForm"]["description"].value;

            if (description == null || description == "") { 
                alert("Description must be filled out");
                return false;
            }
            
        }
    </script>
    
    </head>
    
    <body>
      <div id="send_update">  
    <form name="sendUpdateForm" action="../controlers/updatecontroler.php" method = "post" onsubmit = "validate()">

        Title <br><input type="text" name="title" required>
            <br><br>
        
        Description <br><textarea  type="text" name="description" rows=11 cols=70>

        </textarea><br><br>
            <input  style="background-color: green; cursor: pointer; width: 140px; color: white;" type="submit" value="Send Update">
    </form>
    </div>
</body>
</html>