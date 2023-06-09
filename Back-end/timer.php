<?php
function countdown($minutes, $seconds) {
    $secondsRemaining = ($minutes * 60) + $seconds;
    
    while ($secondsRemaining > 0) {
        $minutes = floor($secondsRemaining / 60);
        $seconds = $secondsRemaining % 60;
        
        // Output the remaining time
        echo sprintf('%02d:%02d', $minutes, $seconds);
        
        // Wait for 1 second
        sleep(1);
        
        // Decrease the remaining time
        $secondsRemaining--;
        
        // Clear the previously outputted time from the console
        echo "\r";
    }
    
    echo "Time is up!";
}

echo countdown(20, 0);

