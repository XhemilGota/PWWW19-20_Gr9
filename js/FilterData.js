  var changes = 0;         
function filterData()
{
    
    //Number(minPrice.replace(/[^0-9.-]+/g,""));
    var minPrice = document.getElementById("filterByMinPrice").value;
        minPrice = Number(minPrice.replace(/[^0-9.-]+/g,""));
//        
    var maxPrice = document.getElementById("filterByMaxPrice").value;
        maxPrice = Number(maxPrice.replace(/[^0-9.-]+/g,""));
        
    var filterByCity = document.getElementById("filterByCity").value;
    
    var minSqrfe = document.getElementById("filterByMinSqrfe").value;
        minSqrfe = Number(minSqrfe.replace(/[^0-9.-]+/g,""));
        
    var maxSqrfe = document.getElementById("filterByMaxSqrfe").value;
        maxSqrfe = Number(maxSqrfe.replace(/[^0-9.-]+/g,""));
     
    var numOfBedrooms = document.getElementById("filterByBedrooms").value;
        if(numOfBedrooms==="No. of Bedrooms")
        {
            numOfBedrooms=0;
        }
        else
        {
            numOfBedrooms = Number(numOfBedrooms.replace(/[^0-9.-]+/g,""));
        }
     
        
    var imgBox = document.getElementsByClassName("imgBox");

    var imgInfo = document.getElementsByClassName("imgInfo");
    
    var element = imgBox[13];
    
//    if(changes===0)
//    {
//        document.getElementsByClassName("photos")[0].appendChild(element);
//        changes++;
//    }
    

    var count = 0;
      
    for(var i=0; i<imgBox.length; i++)
    {
        
        
        var price = imgInfo[i].getElementsByClassName("price")[0].textContent;
        price = Number(price.replace(/[^0-9.-]+/g,""));
        
        var city = imgInfo[i].getElementsByClassName("city")[0].textContent;
        
        var bedroom = imgInfo[i].getElementsByClassName("bedroom")[0].textContent;
        bedroom = Number(bedroom.replace(/[^0-9.-]+/g,""));
        
        var sqrfe = imgInfo[i].getElementsByClassName("sqrfe")[0].textContent;
        sqrfe = Number(sqrfe.replace(/[^0-9.-]+/g,""));
        
        
        if((price<minPrice || price>maxPrice) && maxPrice !==0)
        {
            imgBox[i].style.display="none";
        }
        else if(filterByCity!==city && filterByCity !== "City")
        {
            imgBox[i].style.display="none";
        }
        else if((sqrfe<minSqrfe || sqrfe>maxSqrfe) && maxSqrfe !== 0)
        {
            imgBox[i].style.display="none";
        }
        else if(bedroom<numOfBedrooms)
        {
            imgBox[i].style.display="none";
        }
       
        else
        {
            count++;
           
            if(count%3===0)
            {
                imgBox[i].className="imgBox lastBox";
            }
            else
            {
                imgBox[i].className="imgBox";
            }
            imgBox[i].style.display="";
            
             if(i>11 && count<=12)
            {
               document.getElementsByClassName("photos")[0].appendChild(imgBox[i]);
               //document.getElementsByClassName("photos")[1].style.display="none";
               
            }
            

        }
        
    }
    
              var firstDivLength = document.getElementsByClassName("photos")[0].childElementCount;
              
              var x=0;
              for(var i=0; i<firstDivLength; i++)
              {
                  if(imgBox[i].style.display!=="none")
                  {
                      x++;
                  }
                 
              }
              
              
              
             

              for(var j=x-1; j>=12; j--)
                 {
                     document.getElementsByClassName("photos")[1].appendChild(imgBox[j]);
                 }
                 
               firstDivLength = document.getElementsByClassName("photos")[0].childElementCount;
               
              
               var secondDivLength=document.getElementsByClassName("photos")[1].childElementCount;
               
               
               var y =0;
               for(var i=firstDivLength; i< firstDivLength + secondDivLength; i++)
               {
                   if(imgBox[i].style.display!=="none")
                  {
                      y++;
                      if(y%3===0)imgBox[i].className="imgBox lastBox";
                      else imgBox[i].className="imgBox";
                  }
               }
               

             }
   

            