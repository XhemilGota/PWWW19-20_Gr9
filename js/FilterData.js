        
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
    console.log(isNaN("behar"));
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
    
    var count = 0;
    
    for(var i=0; i<imgBox.length; i++)
    {
        var position = imgBox[i].getElementsByClassName("position")[0].textContent;
        position=parseInt(position);
        if(position<12)
        {
             //document.getElementsByClassName("photos")[0].appendChild(imgBox[i]);
           var item = imgBox[i];
           var list = document.getElementsByClassName("photos")[0];
           list.insertBefore(item, list.childNodes[position]);
             
        }
        else
        {
           document.getElementsByClassName("photos")[1].appendChild(imgBox[i]);
        }
    }
    
    //sortimi i faqes 2
    for(var i=12; i<24; i++)
    {
        
        for(var j=12; j<24; j++)
        {
            var position = imgBox[j].getElementsByClassName("position")[0].textContent;
            position=parseInt(position);
            if(position===i)
            {
                var item = imgBox[j];
                var list = document.getElementsByClassName("photos")[1];
                list.insertBefore(item, list.childNodes[position]);
            }  
            
        }
    }
      
    for(var i=0; i<imgBox.length; i++)
    {
        
        var price = imgInfo[i].getElementsByClassName("price")[0].textContent;
        price = Number(price.replace(/[^0-9.-]+/g,""));
        
        var city = imgInfo[i].getElementsByClassName("city")[0].textContent;
        
        var bedroom = imgInfo[i].getElementsByClassName("bedroom")[0].textContent;
        bedroom = Number(bedroom.replace(/[^0-9.-]+/g,""));
        
        var sqrfe = imgInfo[i].getElementsByClassName("sqrfe")[0].textContent;
        sqrfe = Number(sqrfe.replace(/[^0-9.-]+/g,""));
        
        
        if((price<minPrice || (price>maxPrice && maxPrice !==0)))
        {
            imgBox[i].style.display="none";
        }
        else if(filterByCity!==city && filterByCity !== "City")
        {
            imgBox[i].style.display="none";
        }
        else if((sqrfe<minSqrfe || (sqrfe>maxSqrfe && maxSqrfe !== 0)))
        {
            imgBox[i].style.display="none";
        }
        else if(bedroom<numOfBedrooms)
        {
            imgBox[i].style.display="none";
        }
       
        else
        {
            imgBox[i].style.display="";
            count++;
            
            if(count%3===0)
            {
                imgBox[i].className="imgBox lastBox";
            }
            else
            {
                imgBox[i].className="imgBox";
            }
            
            
             if(i>11 && count<=12)
            {
               document.getElementsByClassName("photos")[0].appendChild(imgBox[i]);
            }
            

        }
        
    }
    
    //nese ka ma pak se 12 shpallje qe i plotsojn kriteret nga filtrimi, me u hjek opsioni me navigu ne faqen e dyte
    if(count<=12)
    {
        document.getElementById("page2").style.display="none";
        changePage(1);
    }
    else
    {
        document.getElementById("page2").style.display="";
    }
    
    //nese asnje shpallje nuk e plotson kriterin, me e shfaq canvasin dhe me i hjek pjest e navigimit
    if(count===0)
    {
        document.getElementById("notFound").style.display="";
         document.getElementById("page1").style.display="none";
    }
    else
    {
        document.getElementById("notFound").style.display="none";
        document.getElementById("page1").style.display="";
    }
    
    var check = document.getElementsByClassName("photos")[1].style.display;
    if(count<=2 || (check!=="none"&&count>12&&count<=14))
    {
        document.getElementById("navigationWrapper").style="position:absolute; bottom:-30px;";
    }
    else
    {
        document.getElementById("navigationWrapper").style="";
    }
}