
var validUser = false;


/*
function findLanguage()
{
    alert(document.getElementsByClassName("dropdownOptions")[0].selectedOptions[0].text);
    
    return document.getElementsByClassName("dropdownOptions")[0].selectedOptions[0].text;
    
    //document.getElementById("Aba").innerHTML = strUser;
         
}
*/

 

//confirm the whole submission later
function confirmSubmission(){
       
    return(true);
    
}
 

//check if the password is the same as the previous one as confirmation
/*
function confirmPassword(){
    
    
    
    
   
    if(document.getElementById("registerPass").value == document.getElementById("registerPassRepeat").value){
        
        
        alert("Same");
        
    }
    else{
        alert("Not same");
    }
    
 
}
 * 
 */


//make password visible
function showPassword(){
    
    if(document.getElementById("registerPass").getAttribute(('type')) === 'password'){
  
        document.getElementById("registerPass").type = 'text';
        document.getElementById("registerPassRepeat").type = 'text';
     
    }
    else
    {
        document.getElementById("registerPass").type = 'password';
        document.getElementById("registerPassRepeat").type = 'password';
              
    }
    
    
}


//alert if the name is already taken
function alertTakenName(){
    
    alert("That name is already taken, Please try another.");
    
}

function alertTakenMail(){
    
    alert("That e-mail is already taken, Please try another.");
    
}

function alertProperCreation(){
    
    alert("Your account was created successfuly!");
    
}

function alertNonExists(){
    
    alert("No such account combination exists.");
    
}




//show or hide the login div
function toggleLogin() {
    if(document.getElementById("loginDropdown").style.display === "none"){
        document.getElementById("loginDropdown").style.display = "block";
    }
    else
    {
        document.getElementById("loginDropdown").style.display = "none";
    }
}

function closeLoginDropdown(){
    
    
    document.getElementById("loginDropdown").style.display = "none";
    
}

//Function to check if a url exists
function checkImage(url) {
  var request = new XMLHttpRequest();
  request.open("GET", url, true);
  request.send();
  request.onload = function() {
    status = request.status;
    if (request.status == 200) //if(statusText == OK)
    {
      return true;
    } else {
      return false;
    }
  }
}

//upload image to img src element
function handleImageUpload() 
{



var image = document.getElementById("uploadedUserImage").files[0];

    var reader = new FileReader();

    reader.onload = function(e)
    {
      document.getElementById("uploadedPhoto").src = e.target.result;
    }

    reader.readAsDataURL(image);
    
  

} 


//Submit template button
function submitTemplate()
{
    
    var title = document.getElementById("titleInput").value;
    var description = document.getElementById("descriptionInput").value;
    var references = document.getElementById("referenceInput").value;
    
    

    
    document.getElementById("emailContent").href = "mailto:codeswaptemplatesubmission@gmail.com?\n\
    subject="+title+"&body=Title:" +escape('\r\n') +title + escape('\r\n') +"Description:"+escape('\r\n') + description+escape('\r\n')+ "References:" +escape('\r\n') +  references;
    
 
    
}
//show the submission tutorial div on click
function showSubmissionTutorialDiv()
{
    
    if(document.getElementById("hoverTutorial").style.display === "none"){
        document.getElementById("hoverTutorial").style.display = "flex";
    }
    else
    {
        document.getElementById("hoverTutorial").style.display = "none";
    }
    
    
}





//-----------------------------------------------
//JAVASCRIPT METHODS FOR THE CODETRANSLATOR PAGE
////-----------------------------------------------
//Copy to clipboard function
function copyToClipboard() {
  
   const elem = document.createElement('textarea');
   elem.value = (document.getElementById("resultText").innerText);
   document.body.appendChild(elem);
   elem.select();
   document.execCommand('copy');
   document.body.removeChild(elem);
}






//change entry inputs to match for loop
function changeInputs()
{
    // change inputs for the for loop only in the following languages
    if((document.getElementById("languageTranslateFrom").value == 'Java' && document.getElementById("methodName").value =="For-LoopTest") ||
       (document.getElementById("languageTranslateFrom").value == 'C++' && document.getElementById("methodName").value =="For-LoopTest")  ||
       (document.getElementById("languageTranslateFrom").value == 'C#' && document.getElementById("methodName").value =="For-LoopTest"))
    {
    
        var nameVar = document.getElementsByName("variableName")[0].value;

        for(var i=0; i < document.getElementsByName("varNameMid").length; i++){
            document.getElementsByName("varNameMid")[i].innerHTML = nameVar;

         }
    
    }   
  
    
    
}

function translateButton()
{
    //For-Loops...
    if(document.getElementById("languageTranslateFrom").value == 'Java' && document.getElementById("methodName").value =="For-Loop")
    {
        javaToOtherLanguagesForLoop();
    }
    else if(document.getElementById("languageTranslateFrom").value == 'Python' && document.getElementById("methodName").value =="For-Loop")
    {
        pythonToOtherLanguagesForLoop();
    }
    else if(document.getElementById("languageTranslateFrom").value == 'C++' && document.getElementById("methodName").value =="For-Loop")
    {
        CPlusPlusToOtherLanguagesForLoop();
    }
    else if(document.getElementById("languageTranslateFrom").value == 'C#' && document.getElementById("methodName").value =="For-Loop")
    {
        CSharpToOtherLanguagesForLoop();
    }
    ///
    
    
}

//Java to other languages For-Loop
function javaToOtherLanguagesForLoop()
{
    
    //comparison checker 
        var comparisonCheckerElement = document.getElementById("variableComparisonInput");
        var comparisonChecker = comparisonCheckerElement.options[comparisonCheckerElement.selectedIndex].text;
        
        //increment checker
        var incrementCheckerElement = document.getElementById("variableIncrementInput");
        var incrementChecker= incrementCheckerElement.options[incrementCheckerElement.selectedIndex].text;
               
        //These two below will be ints
        //limit number checker
        var limitCheckerElement = document.getElementById("variableLimitInput");
        var limitChecker =  limitCheckerElement.value;
        var limitCheckerNum = parseInt(limitChecker);
        
        //variable equal number
        var variableNumberCheckerElement = document.getElementById("variableNumberInput");      
        var variableNumberChecker = variableNumberCheckerElement.value;
        var variableNumberCheckerNum = parseInt(variableNumberChecker)
    
    
    if(document.getElementById("languageTranslateTo").value == "Java")
    {   
        alert("You are trying to translate to the same language");
        
    }   
    //Java to python
    else if(document.getElementById("languageTranslateTo").value == "Python")
    {
      
        
        if(comparisonChecker == ">" && incrementChecker == "--" && Number(variableNumberChecker) > Number(limitChecker))
        {
               
           var convertedPython = "for " + document.getElementById("variableNameInput").value + " in range (" + document.getElementById("variableNumberInput").value + "," + document.getElementById("variableLimitInput").value + ",-1):";  
           document.getElementById("resultText").innerHTML = convertedPython; 
        }
        else if(comparisonChecker == ">=" && incrementChecker == "--" && Number(variableNumberChecker) > Number(limitChecker))
        {
           
           var convertedPython = "for " + document.getElementById("variableNameInput").value + " in range (" + document.getElementById("variableNumberInput").value + "," + document.getElementById("variableLimitInput").value  + "-1 ,-1 ):";                  
           document.getElementById("resultText").innerHTML = convertedPython; 
        }
        else if(comparisonChecker == "<" && incrementChecker == "++" && Number(variableNumberChecker) < Number(limitChecker))
        {
           //for i in range(0,10):;
           var convertedPython = "for " + document.getElementById("variableNameInput").value + " in range (" + document.getElementById("variableNumberInput").value + "," + document.getElementById("variableLimitInput").value + "):";  
           document.getElementById("resultText").innerHTML = convertedPython; 
        }
        else if(comparisonChecker == "<=" && incrementChecker == "++")
        {
           var convertedPython = "for " + document.getElementById("variableNameInput").value + " in range (" + document.getElementById("variableNumberInput").value + "," + document.getElementById("variableLimitInput").value + "+1 ,+1 " + "):";  
           document.getElementById("resultText").innerHTML = convertedPython; 
        }
        else
        {
            
            alert("Check the variables, you may be entering an input that will put you in an endless loop (Example: '>' input with a '++' incrementation\n\
                    Or you might have entered the number values incorrectly)");
            
        }
        
     
    }
    
    //Java to C++
    else if(document.getElementById("languageTranslateTo").value == "C++")
    {
        
        document.getElementById("resultText").innerHTML = "Luckily for you, you can use the same syntax in C++ as in Java!";
        
        
    }
    //Java to C#
    else if(document.getElementById("languageTranslateTo").value == "C#")
    {
        
        document.getElementById("resultText").innerHTML = "Luckily for you, you can use the same syntax in C# as in Java!";
        
        
    }
    
   
}

//Python to other languages For-Loop
function pythonToOtherLanguagesForLoop()
{
    
  
        //increment checker
        var incrementCheckerElement = document.getElementById("variableIncrementInput");
        var incrementChecker = incrementCheckerElement.options[incrementCheckerElement.selectedIndex].text;
        
        //var number limit
        var limitCheckerElement = document.getElementById("variableLimitInput");
        var limitChecker =  limitCheckerElement.value;
        var limitCheckerNum = parseInt(limitChecker);
               
        
        //variable equal number
        var variableNumberCheckerElement = document.getElementById("variableNumberInput");      
        var variableNumberChecker = variableNumberCheckerElement.value;
        var variableNumberCheckerNum = parseInt(variableNumberChecker)
        
      
        
        
        if(document.getElementById("languageTranslateTo").value == "Python")
        {
            alert("You are trying to translate to the same language");
        }
        
        //Python to Java
        else if(document.getElementById("languageTranslateTo").value == "Java")
        {
             
            if( (limitCheckerNum < variableNumberCheckerNum) && incrementChecker === '-1')
            {
                alert("got here");
                var convertedJava = "for( int " + document.getElementById("variableNameInput").value + " = " +  variableNumberChecker + ";" + document.getElementById("variableNameInput").value +" > " + limitChecker + ";" +  document.getElementById("variableNameInput").value + "-- )"+ "<br>" + "{" + "<br>" + "Action here" + "<br>" + "}"; 
                document.getElementById("resultText").innerHTML = convertedJava; 
            }
            else if( limitCheckerNum > variableNumberCheckerNum && incrementChecker === '+1')
            {
                var convertedJava = "for( int " + document.getElementById("variableNameInput").value + " = " + document.getElementById("variableNumberInput").value + ";" + document.getElementById("variableNameInput").value +" < " +  document.getElementById("variableLimitInput").value + ";" +  document.getElementById("variableNameInput").value + "++ )"+ "<br>" + "{" + "<br>" + "Action here" + "<br>" + "}";  
                document.getElementById("resultText").innerHTML  = convertedJava; 
            }
            else{
                alert("Check the variables, you may be entering an input that will put you in an endless loop (Example: '>' input with a '++' incrementation\n\
                    Or you might have entered the number values incorrectly)");
            }
                     
        }
        
        //Python to C#
        else if(document.getElementById("languageTranslateTo").value == 'C#')
        {
            
           
           if( (limitCheckerNum < variableNumberCheckerNum) && incrementChecker === '-1')
            {
                alert("got here");
                var convertedJava = "for( int " + document.getElementById("variableNameInput").value + " = " +  variableNumberChecker + ";" + document.getElementById("variableNameInput").value +" > " + limitChecker + ";" +  document.getElementById("variableNameInput").value + "-- )"+ "<br>" + "{" + "<br>" + "Action here" + "<br>" + "}";  
                document.getElementById("resultText").innerHTML = convertedJava; 
            }
            else if( limitCheckerNum > variableNumberCheckerNum && incrementChecker === '+1')
            {
                var convertedJava = "for( int " + document.getElementById("variableNameInput").value + " = " + document.getElementById("variableNumberInput").value + ";" + document.getElementById("variableNameInput").value +" < " +  document.getElementById("variableLimitInput").value + ";" +  document.getElementById("variableNameInput").value + "++ )"+ "<br>" + "{" + "<br>" + "Action here" + "<br>" + "}"; 
                document.getElementById("resultText").innerHTML  = convertedJava; 
            }
            else{
                alert("Check the variables, you may be entering an input that will put you in an endless loop (Example: '>' input with a '++' incrementation\n\
                    Or you might have entered the number values incorrectly)");
            }
                     
        }
        
        //Python to C++
        else if(document.getElementById("languageTranslateTo").value == 'C++')
        {
             if( (limitCheckerNum < variableNumberCheckerNum) && incrementChecker === '-1')
            {
                alert("got here");
                var convertedJava = "for( int " + document.getElementById("variableNameInput").value + " = " +  variableNumberChecker + ";" + document.getElementById("variableNameInput").value +" > " + limitChecker + ";" +  document.getElementById("variableNameInput").value + "-- )" + "<br>" + "{" + "<br>" + "Action here" + "<br>" + "}";  
                document.getElementById("resultText").innerHTML = convertedJava; 
            }
            else if( limitCheckerNum > variableNumberCheckerNum && incrementChecker === '+1')
            {
                var convertedJava = "for( int " + document.getElementById("variableNameInput").value + " = " + document.getElementById("variableNumberInput").value + ";" + document.getElementById("variableNameInput").value +" < " +  document.getElementById("variableLimitInput").value + ";" +  document.getElementById("variableNameInput").value + "++)"  + "<br>" + "{" + "<br>" + "Action here" + "<br>" + "}";  
                document.getElementById("resultText").innerHTML  = convertedJava; 
            }
            else{
                alert("Check the variables, you may be entering an input that will put you in an endless loop (Example: '>' input with a '++' incrementation\n\
                    Or you might have entered the number values incorrectly)");
            }
                     
        }
        
        //If some conditions are not met
        else
        {
            
            alert("Check the variables, you may be entering an input that will put you in an endless loop (Example: '>' input with a '++' incrementation\n\
                    Or you might have entered the number values incorrectly)");
            
        }
  
}

//C++ To others For-Loop
function CPlusPlusToOtherLanguagesForLoop()
{
    
    
    //comparison checker 
        var comparisonCheckerElement = document.getElementById("variableComparisonInput");
        var comparisonChecker = comparisonCheckerElement.options[comparisonCheckerElement.selectedIndex].text;
        
        //increment checker
        var incrementCheckerElement = document.getElementById("variableIncrementInput");
        var incrementChecker= incrementCheckerElement.options[incrementCheckerElement.selectedIndex].text;
               
        //These two below will be ints
        //limit number checker
        var limitCheckerElement = document.getElementById("variableLimitInput");
        var limitChecker =  limitCheckerElement.value;
        
        //variable equal number
        var variableNumberCheckerElement = document.getElementById("variableNumberInput");      
        var variableNumberChecker = variableNumberCheckerElement.value;
    
    
    if(document.getElementById("languageTranslateTo").value == 'C++')
    {   
        alert("You are trying to translate to the same language");
        
    }   
    //Java to python
    else if(document.getElementById("languageTranslateTo").value == "Python")
    {
      
        
       if(comparisonChecker == ">" && incrementChecker == "--" && Number(variableNumberChecker) > Number(limitChecker))
        {
               
           var convertedPython = "for " + document.getElementById("variableNameInput").value + " in range (" + document.getElementById("variableNumberInput").value + "," + document.getElementById("variableLimitInput").value + ",-1):";  
           document.getElementById("resultText").innerHTML = convertedPython; 
        }
        else if(comparisonChecker == ">=" && incrementChecker == "--" && Number(variableNumberChecker) > Number(limitChecker))
        {
           
           var convertedPython = "for " + document.getElementById("variableNameInput").value + " in range (" + document.getElementById("variableNumberInput").value + "," + document.getElementById("variableLimitInput").value  + "-1 ,-1 ):";                  
           document.getElementById("resultText").innerHTML = convertedPython; 
        }
        else if(comparisonChecker == "<" && incrementChecker == "++" && Number(variableNumberChecker) < Number(limitChecker))
        {
           //for i in range(0,10):;
           var convertedPython = "for " + document.getElementById("variableNameInput").value + " in range (" + document.getElementById("variableNumberInput").value + "," + document.getElementById("variableLimitInput").value + "):";  
           document.getElementById("resultText").innerHTML = convertedPython; 
        }
        else if(comparisonChecker == "<=" && incrementChecker == "++")
        {
           var convertedPython = "for " + document.getElementById("variableNameInput").value + " in range (" + document.getElementById("variableNumberInput").value + "," + document.getElementById("variableLimitInput").value + "+1 ,+1 " + "):";  
           document.getElementById("resultText").innerHTML = convertedPython; 
        }
        else
        {
            
            alert("Check the variables, you may be entering an input that will put you in an endless loop (Example: '>' input with a '++' incrementation\n\
                    Or you might have entered the number values incorrectly)");
            
        }
        
     
    }
    
    //Java to C++
    else if(document.getElementById("languageTranslateTo").value == 'Java')
    {
        
        document.getElementById("resultText").innerHTML = "Luckily for you, you can use the same syntax in C++ as in Java!";
        
        
    }
    //Java to C#
    else if(document.getElementById("languageTranslateTo").value == 'C#')
    {
        
        document.getElementById("resultText").innerHTML = "Luckily for you, you can use the same syntax in C# as in Java!";
        
        
    }
    
    
    
}

//C# To others For-Loop
function CSharpToOtherLanguagesForLoop()
{
    
    
    //comparison checker 
        var comparisonCheckerElement = document.getElementById("variableComparisonInput");
        var comparisonChecker = comparisonCheckerElement.options[comparisonCheckerElement.selectedIndex].text;
        
        //increment checker
        var incrementCheckerElement = document.getElementById("variableIncrementInput");
        var incrementChecker= incrementCheckerElement.options[incrementCheckerElement.selectedIndex].text;
               
        //These two below will be ints
        //limit number checker
        var limitCheckerElement = document.getElementById("variableLimitInput");
        var limitChecker =  limitCheckerElement.value;
        
        //variable equal number
        var variableNumberCheckerElement = document.getElementById("variableNumberInput");      
        var variableNumberChecker = variableNumberCheckerElement.value;
    
    
    if(document.getElementById("languageTranslateTo").value == 'C#')
    {   
        alert("You are trying to translate to the same language");
        
    }   
    //Java to python
    else if(document.getElementById("languageTranslateTo").value == "Python")
    {
      
        
        if(comparisonChecker == ">" && incrementChecker == "--" && Number(variableNumberChecker) > Number(limitChecker))
        {
               
           var convertedPython = "for " + document.getElementById("variableNameInput").value + " in range (" + document.getElementById("variableNumberInput").value + "," + document.getElementById("variableLimitInput").value + ",-1):";  
           document.getElementById("resultText").innerHTML = convertedPython; 
        }
        else if(comparisonChecker == ">=" && incrementChecker == "--" && Number(variableNumberChecker) > Number(limitChecker))
        {
           
           var convertedPython = "for " + document.getElementById("variableNameInput").value + " in range (" + document.getElementById("variableNumberInput").value + "," + document.getElementById("variableLimitInput").value  + "-1 ,-1 ):";                  
           document.getElementById("resultText").innerHTML = convertedPython; 
        }
        else if(comparisonChecker == "<" && incrementChecker == "++" && Number(variableNumberChecker) < Number(limitChecker))
        {
           //for i in range(0,10):;
           var convertedPython = "for " + document.getElementById("variableNameInput").value + " in range (" + document.getElementById("variableNumberInput").value + "," + document.getElementById("variableLimitInput").value + "):";  
           document.getElementById("resultText").innerHTML = convertedPython; 
        }
        else if(comparisonChecker == "<=" && incrementChecker == "++")
        {
           var convertedPython = "for " + document.getElementById("variableNameInput").value + " in range (" + document.getElementById("variableNumberInput").value + "," + document.getElementById("variableLimitInput").value + "+1 ,+1 " + "):";  
           document.getElementById("resultText").innerHTML = convertedPython; 
        }
        else
        {
            
            alert("Check the variables, you may be entering an input that will put you in an endless loop (Example: '>' input with a '++' incrementation\n\
                    Or you might have entered the number values incorrectly)");
            
        }
        
     
    }
    
    //Java to C++
    else if(document.getElementById("languageTranslateTo").value == 'C++')
    {
        
        document.getElementById("resultText").innerHTML = "Luckily for you, you can use the same syntax in C# as in C++!";
        
        
    }
    //Java to C#
    else if(document.getElementById("languageTranslateTo").value == 'Java')
    {
        
        document.getElementById("resultText").innerHTML = "Luckily for you, you can use the same syntax in C# as in Java!";
        
        
    }
    
    
    
}




