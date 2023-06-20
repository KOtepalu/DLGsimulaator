var timerInterval;
var initialDuration = 20 * 60;

function startTimer(duration) {
  var timerDisplay = document.getElementById('timer');
  var minutes, seconds;

  timerInterval = setInterval(function () {
    var timer2 = duration - ((new Date().getTime() - localStorage.getItem('timerStartValue')) / 1000);
    minutes = parseInt(timer2 / 60, 10);
    seconds = parseInt(timer2 % 60, 10);

    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    timerDisplay.textContent = minutes + ":" + seconds;

    if (timer2 < 0) {
      clearInterval(timerInterval);
      saveTimePassedToSession();
      window.location.href = "results.php?timerStopped=true";
    }
  }, 1000);
}

// Add an event listener to the "Begin" button
document.getElementById('start-int-button').addEventListener('click', function() {
  startTimer(initialDuration);
  localStorage.setItem('timerStartValue', new Date().getTime());
  console.log("Timer started at", new Date().getTime());
});

function calculateTimePassed() {
  var elapsedTime = (new Date().getTime() - localStorage.getItem('timerStartValue')) / 1000;
  return elapsedTime;
}

function saveTimePassedToSession() {
  var timePassed = calculateTimePassed();
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'save_time_passed.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      console.log("Time passed saved to session successfully.");
    } else {
      console.log("Failed to save time passed to session.");
    }
  };
  xhr.send('timePassed=' + parseInt(timePassed / 60) + ":" + (timePassed % 60));
}
