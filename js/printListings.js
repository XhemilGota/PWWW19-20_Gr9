price = parseInt(price);
price="$" +price.toLocaleString();
console.log(price);
document.getElementsByClassName("photos")[0].innerHTML+=      
"<div class= '" + class_Name + "'" + "onclick='getIndex("+index+"); blurOthers(); slide();'>\n" +
"<img src=" +imagePath+" width='300' height='210' alt='Chicago, IL 60614Park West'>\n" +

"<div class='imgInfo '>\n" +
                                
    "<p class='city' style='display:none;'>"+city+"</p>\n" +
    "<p class='price'>"+price+"</p>\n" +
    "<p>\n" +
        "<img src='img/homepage/bedLogo.JPG'> <span class='bedroom'>"+bedroom + "bd</span>\n" +
        "<img src='img/homepage/bathLogo.JPG'> <span class='bathroom'>"+bathroom + "ba</span>\n" +
        "<img src='img/homepage/sqrftLogo.JPG'> <span class='sqrfe'>"+sqrfe+"sqrft</span>\n" +
    "</p>\n" +
"</div>\n" +
"</div>\n" ;