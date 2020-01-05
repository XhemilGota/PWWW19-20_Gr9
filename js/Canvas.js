var canvas = document.getElementById("emoji");
var ctx = canvas.getContext("2d");

var radius = 100;
var x_pos = 100;
var y_pos = 150;

var grd = ctx.createRadialGradient(x_pos,y_pos,radius,x_pos,y_pos,radius - 2/20*radius)
grd.addColorStop(1, "#FECC49");
grd.addColorStop(0, "#EE2C2C");

circle(x_pos, y_pos, radius,grd);

ctx.beginPath();

var mouth_x = x_pos;
var mouth_y = y_pos+3/5*radius;
var mouth_radius = 3/5*radius;

ctx.moveTo(mouth_x-1/2*radius,mouth_y);
ctx.quadraticCurveTo(mouth_x+mouth_radius*Math.cos(1.5708),mouth_y-mouth_radius*Math.sin(1.5708),mouth_x+1/2*radius,mouth_y);
ctx.stroke();

circle(x_pos - 1/3*radius,y_pos-1.7/5*radius, radius/7,"#5C342C");
circle(x_pos + 1/3*radius,y_pos-1.7/5*radius, radius/7, "#5C342C");

ctx.font = "30px Arial";
ctx.fillText("Oops...", x_pos + radius + 20, y_pos - radius + radius/2);
ctx.font = "25px Arial";
ctx.fillText("we can't find what you", x_pos + radius + 20, y_pos - radius + radius/2 + 35);
ctx.fillText("are looking for!", x_pos + radius + 20, y_pos - radius + radius/2 + 60);



function circle(x,y,r,color)
{
    ctx.beginPath();
    ctx.arc(x, y, r, 0, 2 * Math.PI);
    ctx.fillStyle = color;
    ctx.stroke();
    ctx.fill();
}

