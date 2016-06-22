 function doClick(x){
        if(x == 1){
        	//document.getElementById("active1").style.backgroundColor = 'green';
            document.getElementById("active1").style.backgroundColor = '#4D4D4D';
            document.getElementById("active1").style.color = '#ffffff';
            reset2();
            reset3();
            reset4();
            reset5();
            reset6();
        }
        
        else if(x == 2){
        	//document.getElementById("active2").style.backgroundColor = 'green';
            document.getElementById("active2").style.backgroundColor = '#4D4D4D';
            document.getElementById("active2").style.color = '#ffffff';
           	reset1();
           	reset3();
           	reset4();
           	reset5();
            reset6();
        }
        
        else if(x == 3){
        	
            document.getElementById("active3").style.backgroundColor = '#4D4D4D';
            document.getElementById("active3").style.color = '#ffffff';
            reset1();
            reset2();
            reset4();
            reset5();
            reset6();
        }
        
        else if(x == 4){

            document.getElementById("active4").style.backgroundColor = '#4D4D4D';
            document.getElementById("active4").style.color = '#ffffff';
            reset1();
            reset2();
            reset3();
            reset5();
            reset6();
        }

        else if(x == 5){

            document.getElementById("active5").style.backgroundColor = '#4D4D4D';
            document.getElementById("active5").style.color = '#ffffff';
            reset1();
            reset2();
            reset3();
            reset4();
            reset6();
        }

        else if(x == 6){

            document.getElementById("active6").style.backgroundColor = '#4D4D4D';
            document.getElementById("active6").style.color = '#ffffff';
            reset1();
            reset2();
            reset3();
            reset4();
            reset5();
        }
    }

    function reset1(){
    	 document.getElementById("active1").style.backgroundColor = '#ffffff';
         document.getElementById("active1").style.color = '#4D4D4D';      
    }

    function reset2(){
    	document.getElementById("active2").style.backgroundColor = '#ffffff';
        document.getElementById("active2").style.color = '#4D4D4D';
    }

    function reset3(){
    	document.getElementById("active3").style.backgroundColor = '#ffffff';
        document.getElementById("active3").style.color = '#4D4D4D';

    }

    function reset4(){
    	document.getElementById("active4").style.backgroundColor = '#ffffff';
        document.getElementById("active4").style.color = '#4D4D4D';
    }

    function reset5(){
    	document.getElementById("active5").style.backgroundColor = '#ffffff';
        document.getElementById("active5").style.color = '#4D4D4D';
    }

    function reset6(){
        document.getElementById("active6").style.backgroundColor = '#ffffff';
        document.getElementById("active6").style.color = '#4D4D4D';
    }