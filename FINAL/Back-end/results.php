
<?php
session_start();

$new_form_id = $_SESSION['form_id'] ?? "";

if (isset($_POST['timePassed'])) {
    $timePassed = $_POST['timePassed'];
    $_SESSION['timePassed'] = $timePassed;
} elseif (isset($_SESSION['timePassed'])) {
    // Retrieve the value from localStorage if available
    if (isset($_SESSION['localStorageTimePassed'])) {
        $timePassed = $_SESSION['localStorageTimePassed'];
        $_SESSION['timePassed'] = $timePassed;
        unset($_SESSION['localStorageTimePassed']); // Remove the temporary localStorage value
    } else {
        $timePassed = $_SESSION['timePassed'];
    }
} else {
    $timePassed = 0;
}

if (isset($_POST['points'])) {
    $points = $_POST['points'];
    $_SESSION['points'] = $points;
}

$servername = "localhost";
$username = "if22";
$password = "if22pass";
$dbname = "if22_DLGsimulaator";

$new_form_id = $_SESSION['form_id'] ?? "";
$points = $_SESSION['points'] ?? "";
$timePassed = $_SESSION['timePassed'] ?? "";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['timePassed']) && isset($_SESSION['form_id'])) {
    $timePassed = $_SESSION['timePassed'];
    $form_id = $_SESSION['form_id'];

    $formattedTime = gmdate("H:i:s", $timePassed);

    $sql = "UPDATE User_Result SET result_time = '$formattedTime' WHERE Form_form_id = '$form_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Front-end/results.css">
    <script src="timer.js"></script>
    <title>DLG sisseastumisintervjuu simulaator</title>
</head>
<body>
<div class="session-value">
  <p>Time Passed: <?php echo $_SESSION['timePassed'] ?></p>
</div>
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
            <form action="submitname.php" method="POST">
                <input type="hidden" name="points" value="<?php echo $points; ?>">
                <button type="submit" class="submit">Share on leaderboard</button>
            </form>
        </div>
    </div>
    <script>
var timePassed = calculateTimePassed();
console.log("Time passed: " + timePassed + " seconds");
saveTimePassedToSession(); // Add this line to save timePassed to session
</script>
</body>
</html>
