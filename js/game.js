function pentaClick()
{
	
	document.getElementsByTagName("H1")[0].addEventListener('click', function (evt) {
	    if (evt.detail === 5) {
	        window.open("game.html");
	    }
	});

}

var canvas = document.getElementById("game");
var context = canvas.getContext("2d");

const box = 32;

var background = new Image();
background.src = "img/game/background.jpg";

var foodImg = new Image();
foodImg.src = "img/game/apple.png";

var eat = new Audio();
eat.src = "img/game/Biting.mp3"

var over = new Audio();
over.src = "img/game/gameover.wav"

var snake = [];

snake[0] = {
	x : 9 * box,
	y : 10 * box
};

var food = {
	x : Math.floor(Math.random()*18+1) * box,
	y : Math.floor(Math.random()*16+3) * box
};

var score = 0;

direction;

document.addEventListener("keydown", direction);

function direction(event){
    var key = event.keyCode;
    if( key == 37 && direction != "RIGHT"){
        direction = "LEFT";
        document.getElementById("left").click();
    
    }else if(key == 38 && direction != "DOWN"){
        direction = "UP";
        document.getElementById("up").click();
        
    }else if(key == 39 && direction != "LEFT"){
        direction = "RIGHT";
        document.getElementById("right").click();

    }else if(key == 40 && direction != "UP"){
        direction = "DOWN";
        document.getElementById("down").click();
    }
}

function left(){
	direction = "LEFT";
}

function right(){
	direction = "RIGHT";
}

function up(){
	direction = "UP";
}

function down(){
	direction = "DOWN";
}

function collision(head,array){
    for(var i = 0; i < array.length; i++){
        if(head.x == array[i].x && head.y == array[i].y){
            return true;
        }
    }
    return false;
}

function draw(){

	context.drawImage(background,0,0);
    
	context.fillStyle = "white";
        context.fillRect(0, 0, 640, 3*box);

    for( var i = 0; i < snake.length ; i++){
        context.fillStyle = ( i == 0 )? "blue" : "white";
        context.fillRect(snake[i].x,snake[i].y,box,box);
        
        context.strokeStyle = "red";
        context.strokeRect(snake[i].x,snake[i].y,box,box);
    }
    
    context.drawImage(foodImg, food.x, food.y);
    
    var snakeX = snake[0].x;
    var snakeY = snake[0].y;
    
    if( direction == "LEFT") snakeX -= box;
    if( direction == "UP") snakeY -= box;
    if( direction == "RIGHT") snakeX += box;
    if( direction == "DOWN") snakeY += box;
   
    if(snakeX == food.x && snakeY == food.y){
        score++;
        eat.play();
        food = {
            x : Math.floor(Math.random()*18+1) * box,
            y : Math.floor(Math.random()*16+3) * box

        }
        
    }else{
        snake.pop();
    }
    
    var newHead = {
        x : snakeX,
        y : snakeY
    }
    
    if(snakeX < 0 || snakeX > 19 * box || snakeY < 3*box || snakeY > 19*box || collision(newHead,snake)){
        clearInterval(game);
        over.play();
    }
    
    snake.unshift(newHead);
    
    context.fillStyle = "black";
    context.font = "45px Changa one";
    context.fillText(score,2*box,1.6*box);
}



var game = setInterval(draw,100);