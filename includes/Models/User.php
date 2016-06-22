<?php
    /* @authors Nahom Asnake and Yared Abebayehu
    /* This is an account validation php class with constructor password and username****
     * use login()
     * use changepassword()
    */
    
    
    /* Warning!! Trying to understand the implementatoin of this class will result in a severe headache followed 
     * by a high temptation for self Injury including suicide, read it at your own risk;*/
    





    /* Instruction:
     *  1. create an object with the right username and pass word for login
     *  2. then to log in use the method login()
     *  3. create an object with the right username and no password to reset password
     *  4. then change password using changepassword(the email of the user, the email's password, the new password);
     *  
     *  This class doesn't check weather the user is reseting the right account, but only the privilages.
     */







    require_once "../controlers/session_controler.php";
    require_once "../util/db_controler.php";
   class Users {
        private $username;
        private $password;
        private $table='users';
        private $rs_table='backup';
        public function __construct($user,$pwd){
            $this->password=$pwd;
            $this->username=$user;     
        }
       // get the user detail if it exists but return null if not
       
        public function getUsers(){
            $data=Array();
            
            
            $sql='select * from users where username='.'"'.$this->username.'"'. ';';
            
            
            $db=new Databasecontroler($this->table);
            $con=$db->con;
            $result=$con->prepare($sql);
            $result->execute();
            if (!$result){
                echo $sql;
                throw new Exception("getting items failed");
        }
            $result->bind_result($username,$password,$level);
            if ($result->num_rows >= 0) {
                
                while($row = $result->fetch()) {
                    $col=Array();
                    $col[0]=$username;
                    $col[1]=$password;
                    $col[2]=$level;
                    array_push($data, $col);
                }
            } else {
                    $data=null;
            }
            return $data;
    }
          
          public function getBackup($em){ // get the email and password from backup table
                    $data=Array();    
                    $sql='select * from backup where email='.'"'.$em.'"'. ';';
                   
                    $db=new Databasecontroler($this->table);
                    $con=$db->con;
                    $result=$con->prepare($sql);
                    $result->execute();
                    
                    /*if(!$result=$con->query($sql)){
                    
                        $this->createELog("couldn't get the querys");
                    
                    }*/
                    $result->bind_result($email, $password);
                    
                    if ($result->num_rows >= 0) {
                        
                        while($row = $result->fetch()) {
                            $col=Array();
                            $col[0]=$email;
                            $col[1]=$password;
                            array_push($data, $col);
                        }
                    } else {
                            $data=null;
                    }
                    return $data;

    }
        
        // return [bool] based on the accout validity and return text if user name or password is wrong based on getusers function
        public function verify(){ //it works
            
            $temp=$this->getUsers();
            if($temp==null){
                echo "<center id=\"tryagain\"><p>Try again ! username does not exist !</p></center>";
            }
            else{
                
            foreach($temp as $val){
                if (!strcmp($val[1],$this->password)){
                   
                    return true;
                }
                else{
                     echo "<center id=\"red\"><p> Password is incorrect </p></center>";  
                     return false;
                }

            }          
            } 
        }
        // based on verify function: redirect if account filled is right but void if not
        public function login(){  // works
            $bool=$this->verify()==1;  
            
            if($bool){
                $user=$this->getUsers()[0][2];
                @session_start();
                if($user==1){
                    @setsession($user);
                    
                    echo "ownerv";
                }
                else{
                    @setsession($user);
                    echo "managerv";
;                }
            }
            return $bool; 
        }
        // to change password :: the constructor should get the username when anb object is being initiated 
        public function changepassword($email,$password,$newpwd){
                $check=$this->getBackup($email);
                
                if(!$check==null){
                    
                    
                    $rs_db=new DatabaseControler($this->rs_table);
                    if(strcmp($email,$check[0][0]) or strcmp($password,$check[0][1])){ // if any of them fails
                        echo "<p>email or password is incorrect!</p>";
                        return false;
                    }
                    else{
                   
                    $db=new DatabaseControler($this->table);
                    $dbcon=$db->con;
                    $qry='update users set password='.'"'.$newpwd.'"'.' where username='.'"'.$this->username.'"'.';';
                    $dbcon->query($qry);
                    
                    $db->done();
                    return true;
                    header("Location: ../../index.php");
                }
                }
                else{                                                          
                    echo "<p>The account your are trying to reset doesn't exist!";
                }
        }
            
        // send log report for error
        public function createELog($data){
             $data+="\n";
            $filename="../errlog.txt";
            $data=$data."onfile".__FILE__."\n";
            $data=$data."onfunction ".__METHOD__;
            $file=fopen($filename,"a") or die("file opening error");
            fwrite($file,$data);
            fclose($file);
        }
        // send log report for status
        public function createSLog($data){
            $data+="\n";
            $filename="../statuslog.txt";
            $file=fopen($filename,"a") or die("file opening error");
            fwrite($file,$data);
            fclose($file);
        }
        
        
    }
  
?>