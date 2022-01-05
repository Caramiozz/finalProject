<?php

session_start(); 



?>




<html>
    
    <head>
        
    <script type="text/javascript" src="javascriptfile.js"></script>
    
   
  
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    
    
    
        
    </head>
  
 
  
    <body>
        
      
      <button name="toggleView" onclick ="showPassword()">View Password</button>
        
        <form method="post" onSubmit="return confirmSubmission();">
            
            <input  placeholder="Enter a username" name="username" type="text" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"/>
            <input  placeholder="Enter an e-mail" name="e-mail" type="email" value="<?php if (isset($_POST['e-mail'])) echo $_POST['e-mail']; ?>"/>
            <input  placeholder="Enter your password" name="password" type="password" id="registerPass"/>
            <input  placeholder="Enter your password again" name="passwordRepeat" type="password" id="registerPassRepeat"/>
            
            
            
            <button name="searchSubmit" type="submit">Submit</button>
            
            
        </form>
      
        
        <script type="text/javascript" src="javascriptfile"></script>

        
        
        
            
    </body>
    
    
    <?php
     
        
      
  
        $conn = mysqli_connect("localhost","admin","1234","maintable");
        
        
        if(isset($_POST['username']) && isset($_POST["password"]) && isset($_POST["passwordRepeat"]) && isset($_POST["e-mail"]))
        {
            //assign variables
            $username = $_POST['username'];
            $password = $_POST["password"];
            $passwordrepeat = $_POST["passwordRepeat"];
            $email = $_POST["e-mail"];
           
            
            if(strlen($username) > 3 && strlen($password) > 6 && ($password == $passwordrepeat)){
                
                $sql="SELECT * FROM users WHERE Username = '".$username."'  ";
                $result = mysqli_query($conn , $sql);
                
                $sql1="SELECT * FROM `users` WHERE `E-Mail` = '".$email."'   ";
                $result1 = mysqli_query($conn , $sql1);
                
                
                $unamecheck = mysqli_fetch_row($result);
                $emailcheck = mysqli_fetch_row($result1);
                           
                   
                //if the row exists, alert that the name is already taken               
                if($emailcheck){
                    echo "<script> alertTakenMail(); </script>"; 
                }                
                if($unamecheck ){
                    echo "<script> alertTakenName(); </script>";    
                }
                              
                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    echo 'Invalid email entry';
                    }
                
                //if conditions are met
                if(!$emailcheck && !$unamecheck && filter_var($email, FILTER_VALIDATE_EMAIL) != false){
                    
                    
                    
                    $sqlEnterUser = "INSERT INTO `users`(`Username`, `Password`, `E-Mail`, `Favourites`)"
                            . " VALUES ('".$username."','".$password."','".$email."','placeholder')";
                    
                    $sqlentry = mysqli_query($conn , $sqlEnterUser);
                    
                    
                    
                    //change global
                    $_SESSION["SessionUsername"] = $username;
                    $_SESSION["SessionEmail"] = $email;
                    
                    //give the user an alert that they have been successful
                    echo "<script>
                    alert('You have successfuly created your account!')
                    window.location.replace('index.php');
                    </script>";
                    
                   
                 
                }
                 
           
                //echo $username;
                }
                
                
            }
            
          
            
            
        
     
        
    
        //$conn = mysqli_connect("localhost","admin","1234","maintable");
            //$sql="SELECT * FROM Methods WHERE Name = '".$name."'  ";
        
        
        
            
        //$sql="SELECT * FROM users WHERE Username = '$name' ";
            
            //$result = mysqli_query($conn , $sql);
            
            //$row = mysqli_fetch_row($result);
    
    
    ?>
    
    
    
</html>