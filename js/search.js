function search()
{
    sessionStorage.setItem("searched_city",capitalize(document.getElementById("searchBar").value));
}

function capitalize(sentence)
{
    var tokens = sentence.split(" ");
    var result = "";

    var i=0;
    while(i<tokens.length)
    {
        tokens[i] = tokens[i].substr(0,1).toUpperCase() + tokens[i].substr(1);
        result += tokens[i] + " ";
        i++;
    }

    return result.trim();
}
    
function enter_click()
{
    var input_field = document.getElementById("searchBar");

    input_field.addEventListener("keyup", function(event)
    {
        if (event.keyCode === 13)
        {
            event.preventDefault();
            document.getElementById("searchButton").click();
        }
    });
}

window.addEventListener("load", enter_click,false)
