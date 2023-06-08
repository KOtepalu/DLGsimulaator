function getRandomLocation() {
    var randomNum = Math.random();
    if (randomNum < 0.5){
        var element = document.getElementById("textBubble");
        element.style.marginLeft = "400px";
        element.style.webkitTransform = "scaleX(-1)";
        element.style.transform = "scaleX(-1)";
    } else {
        var element = document.getElementById("textBubble");
        element.style.marginLeft = "1000px";  
    }
}

getRandomLocation();