<?php
session_start();
$servername = "localhost";
$username = "if22";
$password = "if22pass";
$dbname = "if22_DLGsimulaator";
// Loon AB-ga ühenduse
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* $form_name = $_GET['form_name'];
$form_name = urldecode($form_name);

$form_age = $_GET['form_age'];
$form_age = urldecode($form_age);

$form_country = $_GET['form_country'];
$form_country = urldecode($form_country);

$form_education = $_GET['form_education'];
$form_education = urldecode($form_education);

$form_work = $_GET['form_work'];
$form_work = urldecode($form_work);

$form_hobby = $_GET['form_hobby'];
$form_hobby = urldecode($form_hobby);

$form_kids = $_GET['form_kids'];
$form_kids = urldecode($form_kids); */

$new_form_id = $_SESSION['form_id'] ?? "";
$form_name = $_SESSION['form_name'] ?? "";
$form_age = $_SESSION['form_age'] ?? "";
$form_country = $_SESSION['form_country'] ?? "";
$form_education = $_SESSION['form_education'] ?? "";
$form_work = $_SESSION['form_work'] ?? "";
$form_hobby = $_SESSION['form_hobby'] ?? "";
$form_kids = $_SESSION['form_kids'] ?? "";



if (isset($_GET['form_id'])) {
    $form_id = $_GET['form_id'];
} else {
    $form_id = 0; // Default form_id
}

function getQuestion($questionId){
    global $conn;
    $sql = "SELECT `question_text` FROM `Question` WHERE `question_id` = $questionId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["question_text"];
    } else {
        return "Question not found.";
    }
}

function getAnswers($questionId){
    global $conn;
    $answers_list = [];

    $sql = "SELECT `answer_text`, `next_question_id`, `answer_score` , `answer_end` FROM `Answer` WHERE `Question_question_id` = $questionId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            $answers_list[] = [
                "answer_text" => $row["answer_text"],
                "next_question_id" => $row["next_question_id"],
                "answer_score" => $row["answer_score"],
                "answer_end" => $row["answer_end"]
            ];
        }
    }
    return $answers_list;
}

// Check if a question ID is provided in the URL
if (isset($_POST['questionId'])) {
    $questionId = $_POST['questionId'];
} else {
    $questionId = 1; // Default starting question ID
}

$question = getQuestion($questionId);
$answers = getAnswers($questionId);

function roundScore(&$score) {
    if ($score > 100) {
        $score = 100;
    }
    if ($score < 0) {
        $score = 0;
    }
    $finalScore = $score;
}

// Retrieve the points from the URL parameter
if (isset($_POST['points'])) {
    $points = $_POST['points'];
} else {
    $points = 80; // Default starting points
}

roundScore($points);

//Insert data into User_Result table if answer_end is 1
if (isset($_SESSION['form_id']) && isset($_POST['points']) && $answers[0]['answer_end'] == 1) {
    $form_id = $_SESSION['form_id'];
    $points = $_POST['points'];
    $sql = "INSERT INTO `User_Result` (`Form_form_id`, `result_score`) VALUES ('$form_id', '$points')";
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}

// if ($answers[0]['answer_end'] == 1 && $form_id != 0) {
//     $new_form_id = $_SESSION['form_id'];
//     $points = $next_points;
//     $sql = "INSERT INTO `User_Result` (`Form_form_id`, `result_score`) VALUES ('$new_form_id', '$points')";
//     if ($conn->query($sql) === TRUE) {
//         echo "Data inserted successfully.";
//     } else {
//         echo "Error inserting data: " . $conn->error;
//     }
// }


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="kysimus.css">
</head>
<body>
    <div class="pagecontainer">
        <div class="container1">
            <div class="time" id="timer"></div>
        </div>
        <h2>Session Values:</h2>
    <ul>
        <li>Name: <?php echo $form_name; ?></li>
        <li>Age: <?php echo $form_age; ?></li>
        <li>Country: <?php echo $form_country; ?></li>
        <li>Education: <?php echo $form_education; ?></li>
        <li>Work: <?php echo $form_work; ?></li>
        <li>Hobby: <?php echo $form_hobby; ?></li>
        <li>Kids: <?php echo $form_kids; ?></li>
        <li>form_id: <?php echo $new_form_id; ?></li>
    </ul>
        <img src="../pics/unmute_50.png" alt="mute" class="mute" id="mute" onclick="toggleMute()">
        <div class="container2">
            <div class="kysimused">
                <h2 id="question_text"><?php echo $question; ?></h2>
            </div>
            <div class="points">
                <h2>Points: <?php echo $points; ?></h2>
            </div>
        </div>
        <div class="figures">
            <!-- <?php
            $figure_1 = "../pics/ms_neutral1.0.png";
            $figure_2 = "../pics/pc_neutral1.0.png";
            $hasPositiveFigure = false;
            $hasNegativeFigure = false;

            if (isset($_GET['points'])) {
                $points = $_GET['points'];
                $next_points = $points + $answer_score; // Calculate next points

                if ($next_points > $points) {
                    $figure_1 = "../pics/ms_happy1.0.png";
                    $figure_2 = "../pics/pc_happy1.0.png";
                    $hasPositiveFigure = true;
                } elseif ($next_points < $points) {
                    $figure_1 = "../pics/ms_negative1.0.png";
                    $figure_2 = "../pics/pc_negative1.0.png";
                    $hasNegativeFigure = true;
                }
            }

            if (!$hasPositiveFigure && !$hasNegativeFigure) {
                // Set figures to neutral if neither positive nor negative figure is found
                $figure_1 = "../pics/ms_neutral1.0.png";
                $figure_2 = "../pics/pc_neutral1.0.png";
            } 
            ?>-->

            // <!-- Debugging statements -->
            // <?php echo "Has Positive Figure: " . ($hasPositiveFigure ? "true" : "false"); ?><br>
            // <?php echo "Has Negative Figure: " . ($hasNegativeFigure ? "true" : "false"); ?><br>

            <img src="<?php echo $figure_1; ?>" alt="figures">
            <img src="<?php echo $figure_2; ?>" alt="figures">
        </div>
        <div class="table">
            <div class="button-group">
                <?php foreach ($answers as $answer): ?>
                    <?php

                        $next_question_id = $answer['next_question_id'];
                        $answer_score = $answer['answer_score'];
                        $next_points = $points + $answer_score; // Increase points by answer score
                        $answer_text = $answer['answer_text'];
                        roundScore($next_points);
                        
                        $answer_text = str_replace('[name]', $_SESSION['form_name'], $answer_text);
                        $answer_text = str_replace('[age]', $_SESSION['form_age'], $answer_text);
                        $answer_text = str_replace('[country]', $_SESSION['form_country'], $answer_text);
                        $answer_text = str_replace('[education]', $_SESSION['form_education'], $answer_text);
                        $answer_text = str_replace('[work]', $_SESSION['form_work'], $answer_text);
                        $answer_text = str_replace('[hobby]', $_SESSION['form_hobby'], $answer_text);
                        $answer_text = str_replace('[X]', $_SESSION['form_kids'], $answer_text);


                    ?>

                    <?php if ($answer['answer_end'] == 1): ?>
                        <form action="results.php" method="POST">
                            <input type="hidden" name="points" value="<?php echo $next_points; ?>">
                            <button class="answer-button" type="submit"><?php echo $answer_text; ?></button>
                        </form>
                    <?php else: ?>
                        <form action="index.php" method="POST">
                            <input type="hidden" name="questionId" value="<?php echo $next_question_id; ?>">
                            <input type="hidden" name="points" value="<?php echo $next_points; ?>">
                            <button class="answer-button" type="submit"><?php echo $answer_text; ?></button>
                        </form>
                    <?php endif; ?>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
<script>
var isMuted = false;
var muteBtn = document.getElementById("mute");
var muted = "../pics/mute_50_2.png";
var unmuted = "../pics/unmute_50.png";

function toggleMute() {
    const synth = window.speechSynthesis;
    const voices = synth.getVoices();

    if (isMuted) {
        window.speechSynthesis.cancel();
        muteBtn.textContent = 'Unmute';
        muteBtn.src = muted;
        isMuted = false;
    } else {
        var text = document.getElementById('question_text').textContent;
        var utterance = new SpeechSynthesisUtterance(text);
        utterance.voice = voices["Fred"];
        utterance.volume = 0.2;
        window.speechSynthesis.speak(utterance);
        muteBtn.textContent = 'Mute';
        muteBtn.src = unmuted;
        isMuted = true;
    }
}
</script>
</html>