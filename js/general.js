
    var date = new Date();
    var hour = date.getHours();
    
    if(hour>=8 && hour<16)
    {
        document.body.style.backgroundColor = "white";
    }
    else if(hour>=16 && hour<=23)
    {
        document.body.style.backgroundImage = "linear-gradient(to bottom, #fff, #7aa1d2)";
    }
    else
    {
        document.body.style.backgroundImage = "radial-gradient(circle, #617575, #e8d7b3)";
    }



function changeColorOfMenu(id)
{
    document.getElementById(id).style.color="#40AED7";
}