
<?php
session_start();

$new_form_id = $_SESSION['form_id'] ?? "";

if (isset($_POST['points'])) {
    $points = $_POST['points'];
    $_SESSION['points'] = $points;
}
?>

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
            <form action="submitname.php" method="POST">
                <input type="hidden" name="points" value="<?php echo $points; ?>">
                <button type="submit" class="submit">Share on leaderboard</button>
            </form>
        </div>
    </div>
</body>
</html>
