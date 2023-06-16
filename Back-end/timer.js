if (localStorage.getItem('timerValue')) {

    var timerValue = localStorage.getItem('timerValue');
    startTimer(timerValue);
  } else {
    startTimer(20 * 60);
  }

  function startTimer(duration) {
    var timerDisplay = document.getElementById('timer');
    var timer = duration;
    var minutes, seconds;
  
    setInterval(function () {
      minutes = parseInt(timer / 60, 10);
      seconds = parseInt(timer % 60, 10);
  
      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;
  
      timerDisplay.textContent = minutes + ":" + seconds;
  
      localStorage.setItem('timerValue', timer);
  
      if (--timer < 0) {
        clearInterval(timer); 
        localStorage.removeItem('timerValue');
        window.location.href = "results.php"; 
      }
    }, 1000);
  }