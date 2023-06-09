function getRandomLocation() {
    var randomNum = Math.random();
    if (randomNum < 0.5){
        var element = document.getElementById("textbubble");
    } else {
        var element = document.getElementById("textbubble");
        element.style.webkitTransform = "scaleX(-1)";
        element.style.transform = "scaleX(-1)";
    }
}

getRandomLocation();