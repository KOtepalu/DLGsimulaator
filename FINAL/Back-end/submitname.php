<?php
session_start();
$servername = "localhost";
$username = "if22";
$password = "if22pass";
$dbname = "if22_DLGsimulaator";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['name_input'])) {
    $name = $_POST['name_input'];
    $new_form_id = $_SESSION['form_id'] ?? "";
    
    $sql = "INSERT INTO User_Result (result_name, Form_form_id) VALUES ('$name', '$new_form_id')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Name inserted successfully.";
    } else {
        echo "Error inserting name: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DLG sisseastumisintervjuu simulaator</title>
    <link rel="stylesheet" href="../Front-end/submitname.css">
</head>
<body>
    <div id="textcontainer">
        <p>Submit your name for the leaderboard</p>
        <form method="POST" id="myName">
            <label for="name_input">Name:</label>
            <input type="text" id="name_input" name="name_input" placeholder="Name" required>
            <a href="results.php"><button id="skip">BACK</button></a>
            <a form="myName" href="edetabel.php"><button id="next">SUBMIT</button></a>
        </form>
        <!-- <div id="button">
            <a href="results.php"><button id="skip">BACK</button></a>
            <a form="myName" href="edetabel.php"><button id="next">SUBMIT</button></a>
        </div> -->
    </div>  
</body>
</html>
