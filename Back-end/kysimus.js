function getRandomLocation() {
    var randomNum = Math.random();
    if (randomNum < 0.5){
        var element = document.getElementById("textBubble");
        element.style.left = "400px";
    } else {
        var element = document.getElementById("textBubble");
        element.style.left = "1000px";  
    }
}

getRandomLocation();