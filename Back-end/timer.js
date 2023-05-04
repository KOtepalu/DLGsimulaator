//timer
const beginTimer = document.getElementById("begin_btn");
const timer = document.getElementById("timer");
const finalAnswer = document.getElementById("finalAnswer");

let seconds = 0;
let minutes = 0;
let timerInterval;

function startTimer(){
    timerInterval = setInterval(() => {
        seconds++;
    
    if (seconds === 60){
        seconds = 0;
        minutes++;
    }

    timer.innerText = `${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
    }, 1000);

    if(seconds === 00 && minutes == 20){
        stopTimer();
    }else if(finalAnswer == "clicked"){
        stopTimer();
    }
}

function stopTimer(){
    clearInterval(timerInterval);

    const elapsedTime = (minutes * 60) + seconds;
    console.log(`Elapsed time: ${elapsedTime} seconds`);
}

beginTimer.addEventListener("click", startTimer);