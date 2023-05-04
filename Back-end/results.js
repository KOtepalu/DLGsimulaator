//punktide arvutamine
const results = document.getElementById("results");

let score = 80;
let finalScore = 0;

function updateScore(answer){
switch (answer) {
    case "+1":
      score++;
      break;
    case "-1":
      score--;
      break;
    case "0":
      break;
    case "-80":
      score = 0;
      break;
    }
}

updateScore("+1");
updateScore("-1");
updateScore("+0");
updateScore("-80");

//tulemuste ümardamine, kui on üle 100 punkti või alla 0 punkti
function roundScore(){
    
    if(score > 100){
        score = 100;
    }
    if(score < 0){
        score = 0;
    }
    finalScore = score;
}

console.log(score);

