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

var muteBtn = document.getElementById("mute");
var muted = "../pics/mute_50_2.png";
var unmuted = "../pics/unmute_50.png";
var swap = false;

function toggleMute() {
  if (swap) {
    muteBtn.src = muted;
    swap = false;
  } else {
    muteBtn.src = unmuted;
    swap = true;
  }
}