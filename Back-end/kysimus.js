var bubble = document.getElementById("textbubble");
var leftImage = new Image();
var rightImage = new Image();

leftImage.src = "../pics/chatbubble_left.png";
rightImage.src = "../pics/chatbubble_right.png";

function getRandomChatBubble() {
    var randomNum = Math.random();
    if (randomNum < 0.5){
        bubble.src = leftImage.src;
    } else {
        bubble.src = rightImage.src;
    }
}

getRandomChatBubble();
