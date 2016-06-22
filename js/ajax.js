function ajaxInsertFile(filename,id,type="GET"){

    if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}
    else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}

    xmlhttp.onreadystatechange = function() {
        
        if(xmlhttp.readyState==4){
            
        
            document.getElementById(id).innerHTML=xmlhttp.responseText;
        }
    }
        
    xmlhttp.open(type,filename,true);
    xmlhttp.send();
    
}

function ajaxInsertFilePost(filename,id){
      
    var user= document.getElementById("username").value;
    var password= document.getElementById("password").value;
    
    if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}
    else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
    
    xmlhttp.onreadystatechange = function() {
        
        if(xmlhttp.readyState==4){
            if (xmlhttp.responseText=="<div id='verif'>managerv</div>"){
                location.replace("includes/views/manager_home.php");
            }
            else if (xmlhttp.responseText=="<div id='verif'>ownerv</div>"){
                 location.replace("includes/views/owner_home.php");
            }
            //if (xmlhttp.responseText==)
            
            document.getElementById(id).innerHTML=xmlhttp.responseText;
            
        }
    }
     
    xmlhttp.open("POST",filename,true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    var temp="username="+user+"&password="+password;
    xmlhttp.send("username="+user+"&password="+password);

}
