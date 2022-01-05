<?php


?>


<html>
    
    <head>
        
        <link rel="stylesheet" href="codeTranslatorCSS.css">
        <script type="text/javascript" src="javascriptfile.js"></script>
        
    </head>
    
    
    
    <body>
        
        
        <div id="translatorMainDiv">
            
            <div id ="translatorHeader">
                
                <button id="mainScreenTab" onclick="window.location='index.php'">Home</button>
                <button id="submitTemplateTab"onclick="window.location='submitTemplate.php'">Submit Template</button>  
                
            </div>
            
            
            <div id ="userInputDiv">
            
             
                
            <form method="post" id="userInputForm">
                
                <div id = "translateButtonInFormDiv">
                <button onclick="translateButton()" id="translateButton" type="submit"> Submit Template </button>
                </div>
                
                <div id = "userInputFormInputDiv">
               <input  type="text" placeholder="Method name" name="methodNameTextPost" id="methodName" value="<?php if (isset($_POST['methodNameTextPost'])) echo $_POST['methodNameTextPost']; ?>"></input>  
                
                
              <select id="languageTranslateFrom" name="languageTranslateFromPost">
                    <option value="Java" <?php echo (isset($_POST['languageTranslateFromPost']) && $_POST['languageTranslateFromPost'] == 'Java') ? 'selected' : ''; ?>>Java</option>
                    <option value="Python" <?php echo (isset($_POST['languageTranslateFromPost']) && $_POST['languageTranslateFromPost'] == 'Python') ? 'selected' : ''; ?>>Python</option>
                    <option value="C++" <?php echo (isset($_POST['languageTranslateFromPost']) && $_POST['languageTranslateFromPost'] == 'C++') ? 'selected' : ''; ?>>C++</option>
                    <option value="C#" <?php echo (isset($_POST['languageTranslateFromPost']) && $_POST['languageTranslateFromPost'] == 'C#') ? 'selected' : ''; ?>>C#</option>
                </select>
            
            <img src="https://i.ibb.co/7XK4QKk/arrow-right-icon-128385.png" id="translationArrowRight"></img> 
            
            <select id="languageTranslateTo" name="languageTranslateToPost">
                    <option value="Java" <?php echo (isset($_POST['languageTranslateToPost']) && $_POST['languageTranslateToPost'] == 'Java') ? 'selected' : ''; ?>>Java</option>
                    <option value="Python" <?php echo (isset($_POST['languageTranslateToPost']) && $_POST['languageTranslateToPost'] == 'Python') ? 'selected' : ''; ?>>Python</option>
                    <option value="C++" <?php echo (isset($_POST['languageTranslateToPost']) && $_POST['languageTranslateToPost'] == 'C++') ? 'selected' : ''; ?>>C++</option>
                    <option value="C#" <?php echo (isset($_POST['languageTranslateToPost']) && $_POST['languageTranslateToPost'] == 'C#') ? 'selected' : ''; ?>>C#</option>
                </select>
            
            </div>
                
            
            
             
            </form>
                
             
        
            </div>
            
             <div id = "translateButtonOutsideDiv">  
                <button onclick="translateButton()" id="translateToLanguageButton"> Translate </button>
            </div>    
            
            <div id="translateDiagramDiv">
            
            <div id="translatorLeft">
                
                
                <?php
                
                    if(isset($_POST['languageTranslateFromPost']) && isset($_POST["languageTranslateToPost"]) && isset($_POST["methodNameTextPost"]))
                    {
                        //echo $_POST['searchInput'] . " " . $_POST["language"];            
                        $methodName = $_POST["methodNameTextPost"];
                        $languageTemplate = $_POST["languageTranslateFromPost"];
                      
                        
           
                    $conn = mysqli_connect("localhost","admin","1234","maintable");
                    //$sql="SELECT * FROM Methods WHERE Name = '".$name."'  ";
                            
                    $sql="SELECT * FROM translatemethods WHERE methodname = '$methodName' ";          
                    $result = mysqli_query($conn , $sql);
            
                    $row = mysqli_fetch_row($result);
                    
                   
                      
                    if(!is_null($methodName) && $row != null)
                        {
                
                            if($languageTemplate == "Java")
                            {
                                echo($row[1]);
                            }
                            else if($languageTemplate == "Python")
                            {
                            
                                echo($row[2]);
                            }

                            else if($languageTemplate == "C++")
                            {
                                echo($row[3]);
                            }
                            else
                            {
                           
                                echo($row[4]);
                            }
                 
                        }
                    else
                    {
                       
                        echo "Invalid input";
                    }
                   
                }
                else
                {
                    //$varvar = "Starting empty";
                    //echo $varvar;
                    echo "<p>Emptiness</p>";           
                }
                
                
                ?>
                    
               
                
                 
                
                
                <!--
                <div id="functionInputDiv">
                    
                
                    
                    
                <p>(for int </p>              
                <input type="text" placeholder="Variable" id="variableNameInput" name="variableName" onchange="changeInputs()"></input>
                <p>  = </p>
                <input type="text" placeholder="Variable Number" id="variableNumberInput" name="variableNumber"></input>
                <p>;</p>
            
                <p name="varNameMid" > </p>
                
                <select id="variableComparisonInput">
                    <option value="greater" >></option>
                    <option value="lesser" ><</option>
                    <option value="greaterEqual" >>=</option>
                    <option value="lesserEqual" ><=</option>
                </select>
                
                <input type="text" placeholder="Variable Compare number" id="variableLimitInput" name="variableComparisonNumber"></input>
                
                <p>;</p>
                
                <p name="varNameMid" > </p>
                <select id="variableIncrementInput">
                    <option >++</option>
                    <option >--</option>    
                </select>
                
                <p>;)</p>
                
                
                
                </div>
                
                !-->
                
                
                
                
                
            </div>
                <input type="image" src="https://i.ibb.co/X2G1Y0M/copy-to-clipboard-icon-1.png" onclick="copyToClipboard()" id="copyToClipboardButton"></input>
                
            
            <div id="translatorRight">
                
                <div id = "translatorRightContextDiv">
                <p id="resultText"></p>
                </div>
                
            </div>
                
                
            </div>
            
            
            
            
            
            
            
        </div>
        
        
        
    </body> 
</html>
