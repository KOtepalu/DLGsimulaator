<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Front-end/results.css">
    <title>DLG sisseastumisintervjuu simulaator</title>
</head>
<body>
    <div class="container">       
        <p>Thank you for participating!</p>
        <div class="textcontainer">
            <div class="text">Your result:</div>
            <div id="results" class="text">
                <?php
                        if (isset($_POST['points'])) {
                            $points = $_POST['points'];
                            echo "$points / 100";
                        } else {
                            echo "No points.";
                        }
                    ?>
            </div>
        </div>
        <div class="btncontainer">
            <a href="edetabel.php"><button class="nosubmit">Don't share on leaderboard</button></a>
            <a href="../Front-end/submit_your_name.html"><button class="submit">Share on leaderboard</button></a>
        </div>
    </div>
</body>
</html>
