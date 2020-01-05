
var isAnyFieldBlank=false;

function checkForErrors()
{
    
    isBlank();
    if(!isAnyFieldBlank){
      var isAnyErrorForPhoneNumber = checkErrorsForPhoneNumber(); 
      var isAnyErrorForCity= checkErrorsForCity();
      var isAnyErrorForSSN = checkErrorsForSSN();
      
      if(!(isAnyErrorForCity || isAnyErrorForPhoneNumber || isAnyErrorForSSN))
      {
          alert("Thanks for choosing our company to buy a new home! \n\n\
Our team will contact you very soon!");
          document.getElementById("sell").reset();
      }
    }
    
    return false;
}

var importantInputs = document.getElementsByClassName("required");
var message = document.getElementsByClassName("message");

function isBlank()
{  
    isAnyFieldBlank=false;
    
    for(var i=0; i<importantInputs.length; i++)
    {
        if(importantInputs[i].value==="")
        {
            importantInputs[i].classList.add("error");
            message[i].title="Please fill out this field";
            isAnyFieldBlank=true;
        }
        else
        {
            message[i].title="";
            if(importantInputs[i].classList.contains("error"))
            importantInputs[i].classList.toggle("error");
        
        }
    }
    
}

function checkErrorsForPhoneNumber()
{
    var str = importantInputs[1].value;
    var count = 0;
    if(str.trim().substring(0,1)!=="+")
    {
        message[1].title="Please start your phone number with + sign";
        importantInputs[1].classList.add("error");
        console.log("ska plus");
        return true;
    }
    
    // true nese stringu ka karaktere tjera perveq numrave dhe + it
    
    else if(str.match(/^[0-9 /+]+$/) === null)
    {
        message[1].title="Please insert a valid phone number";
        importantInputs[1].classList.add("error");
        console.log("ka shkronja");
        return true;
    }
    
    else if(str.length<=7)
    {
        message[1].title="Your phone number is short";
        importantInputs[1].classList.add("error");
        return true;
    }
    
    else
    {
        message[1].title="";
        if(importantInputs[1].classList.contains("error"))
            importantInputs[1].classList.toggle("error");
        
        return false;
    }
}

function checkErrorsForCity()
{
    var city = importantInputs[4].value;
    
    // true nese stringu ka karaktere tjera perveq shkronjave dhe hapesirave
    if(!(/^[a-zA-Z ]+$/.test(city)))
    {
        message[4].title="Please enter a valid city";
        importantInputs[4].classList.add("error");
        console.log("Qyteti keq");
        return true;
    }
    else
    {
         message[4].title="";
         if(importantInputs[4].classList.contains("error"))
            importantInputs[4].classList.toggle("error");
         return false;
    }
}

function checkErrorsForSSN()
{
    var ssn = importantInputs[5].value;
    
    var errorMessage="SSN contains only numbers!";
    
    //kontrollon nese stringu permban vetem numra, true nese po

    var patt = new RegExp("[a-zA-Z!@#\$%\^\&*\)\(+=._-]");
  
    if(patt.exec(ssn)!==null)
    {
        message[5].title=errorMessage;
        importantInputs[5].classList.add("error");
        return true;
    }
    else if(ssn.length!==9)
    {
        errorMessage=errorMessage.replace("only numbers", "9 numbers");
        message[5].title=errorMessage;
        importantInputs[5].classList.add("error");
        return true;
    }
    else
    {   
        message[4].title="";
         if(importantInputs[5].classList.contains("error"))
            importantInputs[5].classList.toggle("error");
         return false;
    }
}

