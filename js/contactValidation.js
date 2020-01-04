
var isAnyFieldBlank=false;

function checkForErrors()
{
    
    isBlank();
   
      if(!isAnyFieldBlank)
      {
          alert("Thanks for your comment/question! \n\n\
Our team will respond you very soon!");
          document.getElementById("contact-form").reset();
      }
      else
      {
          alert("Please fill the required fields");
      }
    
    return false;
}

var importantInputs = document.getElementsByClassName("required");


function isBlank()
{  
    isAnyFieldBlank=false;
    
    for(var i=0; i<importantInputs.length; i++)
    {
        if(importantInputs[i].value==="")
        {
            importantInputs[i].classList.add("error");
            isAnyFieldBlank=true;
            
        }
        else
        {
            if(importantInputs[i].classList.contains("error"))
            importantInputs[i].classList.toggle("error");
        
        }
    }
    
}



