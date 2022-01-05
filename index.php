<!DOCTYPE html>

<?php 
    
   
    session_start();
    
    if(!isset($_SESSION["SessionUsername"]))
    {
        $_SESSION["SessionUsername"] = "DefaultName";
        $_SESSION["SessionEmail"] = "Default@Default.com";
    }
    
?>

<html lang="en">
    <head>
        <!--fontawesome icons-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
        
        
        <!-- include the javascript file -->
        <script type="text/javascript" src="javascriptfile.js"></script>
       
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <!-- include the CSS file -->
        <link rel="stylesheet" href="main.css">
        
        
        
        <!-- Confirm resubmission is avoided this way for now... -->
        <script>
            if ( window.history.replaceState )
            {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
        
         
    </head>
    
<body>
<!--div for the search bar functionality -->
    

    <!-- absolute position div for login information -->
    <div id="loggedAccountInfo" style="<?php if($_SESSION["SessionUsername"] == "DefaultName"){echo "display:none";}else{echo "display:flex";} ?>" name="loggedAccountDivPost">
        
        <div id="loggedAccountUsernameDiv">
            <?php                
               //show logged in name
                if(isset($_SESSION["SessionUsername"]))
                {
                    if($_SESSION["SessionUsername"] != "DefaultName")
                    {
                        echo $_SESSION["SessionUsername"]; 
                    }                                              
                }                          
              ?>
        </div>
        
        <div id="loggedAccountFavourites">
            <p>Favourites</p>
        </div>
        
    </div>
    
    <!-- absolute position div for tabs information -->
    <div id="siteTabsDiv">
        
         <button id="translateCodeTab" onclick="window.location='codeTranslator.php'">Translate Code</button>
         <button id="submitTemplateTab"onclick="window.location='submitTemplate.php'">Submit Template</button>    
         
    </div>
    
    

    <div id="mainDiv">
        
        <div id="headerDiv">

       <!-- Dropdown after clicking the login button -->
        <div id="loginDropdown" style="display: none">
        <div id="myDropdown" class="dropdown-content">
          
      <form method="post">
      <input type="text" placeholder="Username" name="loginUsernamePost" id="dropdownUsernameText"><br>
      <input type="password" placeholder="Password" id="dropdownPasswordText" name="loginPasswordPost">
      
      <button id="loginConfirm"  name="loginConfirmButton" type="submit" onclick="closeLoginDropdown()">Login</button>
      </form>
    
      </div>           
      </div>
      
      
      <div id="headerLeft">
          
         <img src="https://i.ibb.co/3T2RT0Y/Resim2.png" id='pageTitle'/>

      </div>
      
     
      <div id="headerRight">
          
          
          
     
            <div id="headerButtons">
    
    <?php
   
    
        //logout function that will destroy the session
        function logoutFunc(){
              session_destroy();
              header("Refresh:0");
        }
        
        //function that will log the user in if proper credentials are given
        function loginFunc(){
            
                    
            if(isset($_POST["loginUsernamePost"]) && isset($_POST["loginPasswordPost"])){
                
                //assign variables to use in the query
                $attemptName = $_POST["loginUsernamePost"];
                $attemptPassword = $_POST["loginPasswordPost"];
                
                
           
                $conn = mysqli_connect("localhost","admin","1234","maintable");
                
                $sqlLogin="SELECT * FROM Users WHERE Username = '$attemptName' ";      
                $resultLogin = mysqli_query($conn , $sqlLogin);          
                $userDetails = mysqli_fetch_row($resultLogin);
                
                
                if($userDetails)
                {
                    if($userDetails[0] == $attemptName & $userDetails[1] == $attemptPassword){
                     $_SESSION["SessionUsername"] = $attemptName;
                     //assign the e-mail via the userDetails query
                     $_SESSION["SessionEmail"] = $userDetails[2];
                     
                 
         
                     
                     
                     //refresh the page
                     header("Refresh:0");
                    }
                }
                else
                {
                    
                   //...
                    
                }
                
            }
             
            
        }
        
        
        //E-mail and Username section top right with echoing HTML code
        //echo "<div id='headerRight'>";
        
        /*
        echo "<span id='userSpan'>Name: </span>";
        echo "<div id='nameDiv'><p id='userP'>".$_SESSION['SessionUsername']."</p>  </div>";
        echo "<span id='userSpan'>Email: </span>";
        echo "<div id='emailDiv'><p id='userP'>".$_SESSION['SessionEmail']." </p></div>";
         * */
         
        
       
        //register button
        
      
        
        
    
        //if we are logged in, show the logout button, if not show the login button
        if(isset($_SESSION["SessionUsername"]))
        {
            
            
            
            if($_SESSION["SessionUsername"] != "DefaultName")
            {       
                echo "<form method='post' id='loginForm'>";
                echo "<input type='submit' id='logoutButton' name='logout' value='Logout'>";
                //echo "<button id='registerButton' onclick=\"window.location='register.php';\" value='Register'>Register</button>";
                echo "</form>";
            }
            else
            {
                
                
                
                echo "<button id='registerButton' onclick=\"window.location='register.php';\" value='Register'>Register</button>";
                echo "<input type='button' onclick=\"toggleLogin()\" id='logoutButton' name='logout' value='Login'>";             
               
                //echo "<form method='post' id='loginForm'>";
                //echo "<input type='button' onclick=\"toggleLogin()\" id='logoutButton' name='logout' value='Login'>";
                //echo "<button id='registerButton' onclick=\"window.location='register.php';\" value='Register'>Register</button>";
                //echo "</form>";       
            }
        
        }
            
        //echo "</div>";
        
        
        //if the button is clicked, call the php function
         if(array_key_exists('logout', $_POST)) {
            
            logoutFunc(); 
        } 
        
        if(array_key_exists('loginConfirmButton', $_POST)){
            
            loginFunc();
        }
  
        
        /*
        echo $_SESSION["SessionUsername"];
        echo $_SESSION["SessionEmail"];
         * 
         */
    
    ?>
              
              
          
          
        
              
              
          </div>
          
          
          </div>
    
    <!-- comment 
    <table border = 1>
        <tr>
            
            <td id="nameTD">Name</td>
            <td id="emailTD">E-mail</td>
            
        </tr>
        
        
    </table>
    
    -->
   
       
</div>

<div id="searchDiv">
   
    
    
    <form method="post" id="searchForm" action="#" style="text-align:center">
        
    <div id="searchDivTop">
        
    <div id="searchDivTopSearchbarDiv">
        <input id="searchInp" placeholder="Search for a function!" name="searchInput" type="text" value="<?php if (isset($_POST['searchInput'])) echo $_POST['searchInput']; ?>"/>
    </div>
       
        <div id="searchDivTopArrowDiv">
            <img id="arrowIcon" src="images/double-horizontal-arrow.png">
        </div>
        
    <div id="searchDivTopDropdownDiv">
    <select name="language" id="searchDropDowns" onchange="this.form.submit()">
        
        <!-- inner php helps us keep track of the selected options even though we submit -->
        <option value="Java" <?php echo (isset($_POST['language']) && $_POST['language'] == 'Java') ? 'selected' : ''; ?>>Java</option>
        <option value="Python" <?php echo (isset($_POST['language']) && $_POST['language'] == 'Python') ? 'selected' : ''; ?>>Python</option>
        <option value="C++" <?php echo (isset($_POST['language']) && $_POST['language'] == 'C++') ? 'selected' : ''; ?>>C++</option>
        <option value="C#" <?php echo (isset($_POST['language']) && $_POST['language'] == 'C#') ? 'selected' : ''; ?>>C#</option>
                       
    </select>
        
    </div>
        
    </div>
    
        <div id="searchDivBottom">
      
         <button id="searchButton"  name="searchSubmit" type="submit">Search</button>
        
        </div>
        
    </form>
        
 </div>






<!--main content div -->
<div id = "mainContent">
 
    
    
    
    
   <?php
    
       /*
    
        if(isset($_POST["searchInput"]) && isset($_POST["language"])){
            if(($_POST["searchInput"] != "" && $_POST["language"] != ""))
            {
                /*
                echo "<div id = 'maincontent_top'>";
                echo "<p id='selectedMethodText'>".$_POST["searchInput"]." ".$_POST["language"]."       </p>";
                echo "</div>";
                //add / later to here
                 * 
                
                
                echo "<div id = 'maincontent_top'>";
                
                //if the selected language is Java
                if($_POST["language"] == "Java")
                {
                    echo "<a href=\"https://www.jdoodle.com/online-java-compiler/\" target=\"_blank\" rel=\"noopener noreferrer\" id=\"compilerLinkText\">Try it yourself!</a>";
                }
                else if($_POST["language"] == "Python")
                {
                     echo "<a href=\"https://www.programiz.com/python-programming/online-compiler/\" target=\"_blank\" rel=\"noopener noreferrer\" id=\"compilerLinkText\">Try it yourself!</a>";                   
                }
                else if($_POST["language"] == "C#")
                {
                     echo "<a href=\"https://www.onlinegdb.com/online_csharp_compiler/\" target=\"_blank\" rel=\"noopener noreferrer\" id=\"compilerLinkText\">Try it yourself!</a>";                   
                }
                else
                {
                    echo "<a href=\"https://www.onlinegdb.com/online_c++_compiler/\" target=\"_blank\" rel=\"noopener noreferrer\" id=\"compilerLinkText\">Try it yourself!</a>";
                }
                
                
                echo "</div>";
                
            }
            
            else
            {
                echo "<div id = 'maincontent_top'>";
                echo "<p id='selectedMethodText'>Welcome!</p>";
                
                 
                
                echo "</div>";
            }
        }
        else
        {
            echo "<div id = 'maincontent_top'>";
            echo "<p id='selectedMethodText'>Welcome!</p>";
            
            
            
            echo "</div>";
        }
        
        */
        
        
   ?>
    
    <!-- tab from language to language -->
    <!--
    <form method="post">
    <div id="mainContentTab">
                   
        <button id="languageTab" type="submit" name="languageTabPostJava">Java</button>
        <button id="languageTab" type="submit" name="languageTabPostPython">Python</button>
        <button id="languageTab" type="submit" name="languageTabPostC++</">C++</button>
        <button id="languageTab" type="submit" name="languageTabPostC#">C#</button>
        
       
    </div>
        
    </form>
    
    !-->
    
   
    

    <!--tutorial content div -->
    <div id = "maincontent_bottom">
        
         
        
        <div id="mainContentBottomLeft">
     
            
            <div id="mainContentBottomLeftText">
                
            
        <?php
        
   
        if(isset($_POST['searchInput']) && isset($_POST["language"])){
            //echo $_POST['searchInput'] . " " . $_POST["language"];
            
            $currentlanguage = $_POST["language"];
            $name = $_POST['searchInput'];
            
                
            $conn = mysqli_connect("us-cdbr-east-05.cleardb.net","bd317668d6ac89","648019f5","heroku_5fe39184ffe2eef");
            //$sql="SELECT * FROM Methods WHERE Name = '".$name."'  ";
            
            $sql="SELECT * FROM Methods WHERE Name = '$name' ";
            
            $result = mysqli_query($conn , $sql);
            
            $row = mysqli_fetch_row($result);
            
                      
            if(!is_null($name) && !is_null($currentlanguage) && $row != null)
            {
                
                if($currentlanguage == "Java"){
                    echo($row[1]);
                    
                    
                }
                
                
                 else if($currentlanguage == "C#")
                {
                
                    echo($row[2]);
                
                }
                
                else if($currentlanguage == "C++")
                {
                
                    echo($row[3]);
                
                }
                
                 else
                {    
                
                    echo($row[4]);
                
                }
            
            }
            else{
                $defaultEcho = "Invalid";
                echo $defaultEcho;
            }
                   
        }
        else{
            //$varvar = "Starting empty";
            //echo $varvar;
            echo "<p>Emptiness</p>";
           
        }
      
           
                                   
        ?>
        
                </div>
        </div>
        
        
        <div id="mainContentBottomRight">
            <div id="mainContentBottomRightImage">
                
                
                <img src="images/placeholderSS.png" id="contentImage">
                
            </div>
                     
        </div>
 

    </div>
    
    



</div>

</div>


</body>
</htm
